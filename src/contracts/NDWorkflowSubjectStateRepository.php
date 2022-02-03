<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface NDWorkflowSubjectStateRepository extends SubjectStateRepository
{
    public function getSubjectState(SubjectIdentifier $identifier, Configuration $configuration): SubjectStateHistorySet;
}
