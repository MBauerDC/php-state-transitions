<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

interface HasStateHistory
{
    public function getStateHistory(): StateHistory;
}
