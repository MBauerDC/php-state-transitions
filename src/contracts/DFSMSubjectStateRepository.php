<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface DFSMSubjectStateRepository extends SubjectStateRepository
{
    public function getSubjectState(SubjectIdentifier $identifier, Configuration $configuration): SubjectState;
}
