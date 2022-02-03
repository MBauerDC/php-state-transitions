<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface TransitionProcessor
{
    public function processTransition(TransitionCandidate $candidate): TransitionResult;
}

