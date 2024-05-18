<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

use App\Domain\Common\ValueObject\Distance;

final class Goal
{
    public function __construct(private Distance $distance)
    {
    }
}
