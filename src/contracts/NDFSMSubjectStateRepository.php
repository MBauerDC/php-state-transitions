<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface NDFSMSubjectStateRepository extends SubjectStateRepository
{
    public function getSubjectState(SubjectIdentifier $identifier, Configuration $configuration): SubjectStateSet;
}
