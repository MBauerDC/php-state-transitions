<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface TransitionResult
{
    public function getSubjectIdentifier(): SubjectIdentifier;

    public function getSubjectState(): SubjectState;

    public function getTransition(): Transition;
}