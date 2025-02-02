<?php

namespace Modules\Flights\Enums;

enum ModelTypeEnum: int
{
    case PLANE = 1;
    case GLIDER = 2;
    case HELICOPTER = 3;
    case DRONE = 4;
    case MOTORGLIDER = 5;
}
