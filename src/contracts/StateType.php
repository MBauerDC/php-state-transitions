<?php
declare(strict_types=1);

namespace MBauer\phpStateTransitions\contracts;

enum StateType
{
    case INITIAL      = 0;
    case INTERMEDIATE = 1;
    case REJECTING    = 2;
    case ACCEPTING    = 3;
}
