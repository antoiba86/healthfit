<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

use App\Domain\Common\ValueObject\Distance;
use App\Domain\User\Entity\Goal;
use App\Domain\User\ValueObject\Age;
use App\Domain\User\ValueObject\Height;
use App\Domain\User\ValueObject\Weight;

final class User
{
    public function __construct(
        private int $id,
        private Height $height,
        private Weight $weigth,
        private Age $age,
        private Distance $distance_goal
    )
    {
    }
}
