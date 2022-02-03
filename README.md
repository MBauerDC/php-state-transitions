# php-state-transitions
Implementation of workflows and finite state machines

## Concepts

### Configurations

*Configuration*s specify entire workflows / finite state machines. These are distinguished by _history dependence_ - i.e. in workflows, *Subjects* are required to have a history of going through certain *State*s to be eligible for certain transitions, while in finite state machines, only the current state (or _states_ in the case of non-detemrinistic finite state machines) is relevant for determining available transitions. In all other details, both these concepts match the usual definition of a finite state machine.


### Subject / SubjectWrapper

A *Subject* is an entity, value-object or data-array which will be assigned states and can undergo transitions. It is packaged together with a *SubjectType*, *SubjectIdentifier* and *State* inside a *SubjectWrapper* for processing in the workflow / finite state machine. Subjects are partitioned into *SubjectType*s, which uniquely specify the kind of entity, value-object or data-array to be accepted. *SubjectIdentifier*s specifiy the type and accessors for identifying data for the subject.


### State

A *State* is a collection of data which uniquely defines where in a graph of such states linked by *Transition*s a *Subject* is.
States are partitioned into *StateType*s, which are `['initial', 'intermediate', 'accepting', 'rejecting']`. In each workflow or finite state machine, exactly one state per *SubjectType* accepted in the machine must be marked as `initial`. At least one state (per *SubjectType* - or for all *SubjectType*s) must be marked as `accepting`, and one or more states may be marked as `rejecting`. All other states are by default of type `intermediate`.


### Transition

A Transition links states (for finite state machines) or state-histories (for workflows) to new states. Initial states cannot have incoming *Transition*s, intermediate states must have incoming *Transition*s, and accepting/rejecting states must not have outgoing *Transition*s. There must be a sequence of transitions ending in an appropriate accepting state for each initial state, otherwise the *Configuration* is considered invalid.

When an instance of *InputData* related to a certain finite state-machine / workflow for a certain *Subject* is given to the system, the *Subject*'s state(-history) and Input together are evaluated to determine which *Transition*s are available - subject to approval by a chain of *TransitionApprover*s specific to each transition.

For deterministic workflows / finite-state machines, the tuple of state and input must uniquely determine a transition. The setting `rejectOnInvalidInput` in a *Configuration* determines whether invalid input will make the system automatically transition into a generic `rejecting` state, while the setting `rejectOnNoApprovedTransitions` will automatically make the system transition into a `rejecting` state when no transitions are approved, even though the input is valid. For both these settings, if they are not set to `true`, the system will remain in the previous state under those conditions.

### TransitionApprover

A *TransitionApprover* receives a *Subject* with a *State*(-history), a *Transition* and *InputData* and will either reject or approve the transition. *TransitionApprovers* are linked in chains, which will pass the data along to each Approver in sequence until one rejects or all have approved. In the former case, the *Transition* is rejected - in the latter, it is approved.

### TransitionProcessor

After a *Transition* is approved, it will be executed by providing relevant data to each *TransitionProcessor* of the unique *TransitionProcessorChain* associated with a given *Transition*. The data provided is the *Subject*, it's *State*(-history), the *Transition*, the *InputData* for the *Transition* - and an instance of *SubjectData*, which is a storage for data that may not be within the *Subject* itself, but is added/changed by *TransitionsProcessors* and potentially checked by *TransitionApprovers*. This storage is uniquely associated to the current *State* of the *Subject* in the workflow / finite state machine, and formally considered part of / additional data regarding its state.

