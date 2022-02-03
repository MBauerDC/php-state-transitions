<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface SubjectStateRepository
{
    public function getSubjectState(SubjectIdentifier $identifier, Configuration $configuration): SubjectState|SubjectStateSet|SubjectStateHistory|SubjectStateHistorySet;
}
