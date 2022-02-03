<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface SubjectState
{
    public function getCurrentState(): State;

    public function getSubjectData(): SubjectData;

    public function getStateHistory(): ?StateHistory;
}
