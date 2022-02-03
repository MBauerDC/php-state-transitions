<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface DWorkflowSubjectStateRepository extends SubjectStateRepository
{
    public function getSubjectState(SubjectIdentifier $identifier, Configuration $configuration): SubjectStateSet & ;
}
