<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

final class ElapsedTime
{
    public function __construct(
        private ElapsedTimeValue $value,
        private ElapsedTimeUnit $unit
    )
    {
    }
}
