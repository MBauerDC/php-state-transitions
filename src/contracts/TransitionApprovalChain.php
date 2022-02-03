<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface TransitionApprovalChain extends TransitionApprover
{
    public function addApprover(TransitionApprover $approver, ?int $afterPos = null): void;
    public function appendApprovers(TransitionApprover ...$approvers): void;
}
