<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface TransitionCandidate
{
    public function getSubjectIdentifier(): SubjectIdentifier;

    public function getSubjectState(): SubjectState;

    public function getConfiguration(): Configuration;

    public function getInputData(): InputData;

    public function getTransition(): Transition;
}
