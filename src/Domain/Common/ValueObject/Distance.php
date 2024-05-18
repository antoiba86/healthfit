<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

final class Distance
{
    public function __construct(
        private DistanceValue $value,
        private DistanceUnit $unit
    )
    {
    }
}
