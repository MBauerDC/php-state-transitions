<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface WorkflowSubjectStateSet extends SubjectStateSet
{
    public function getSubjectStateByIndex(int $index): SubjectState & HasStateHistory;
}
