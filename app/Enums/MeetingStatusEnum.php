<?php

namespace App\Enums;

enum MeetingStatusEnum:int {
    case Draft = 1;
    case Published = 2;
    case Started = 3;
    case Closed = 4;
}
