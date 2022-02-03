<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface TransitionApprover
{
    public function approvesTransition(TransitionCandidate $candidate): bool;
}
