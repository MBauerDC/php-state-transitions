<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface TransitionProcessingChain extends TransitionProcessor 
{
    public function addProcessor(TransitionProcessor $processor, ?int $afterPos = null): void;
    public function appendProcessors(TransitionProcessor ...$processors): void;
}
