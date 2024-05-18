<?php

declare(strict_types=1);

namespace App\Domain\Activity\Entity;

use App\Domain\Activity\ValueObject\Description;
use App\Domain\Activity\ValueObject\Name;
use App\Domain\Activity\ValueObject\ActivityType;

class Activity
{
    public function __construct(
        private int $id,
        private ActivityType $type,
        private Name $name,
        private Description $description
    )
    {
    }
}
