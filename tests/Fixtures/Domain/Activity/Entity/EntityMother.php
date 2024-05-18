<?php

namespace App\Tests\Fixtures\Domain\Activity\Entity;

use App\Domain\Activity\Entity\Activity;
use App\Domain\Activity\ValueObject\ActivityType;
use App\Domain\Activity\ValueObject\Description;
use App\Domain\Activity\ValueObject\Name;

final class EntityMother
{
    public static function makeActivity(
        ?int $id = null,
        ?ActivityType $activity_type = null,
        ?Name $name = null,
        ?Description $description = null
    ): Activity {
        return new Activity(
            id: $id,
            type: $activity_type,
            name: $name,
            description: $description
        );
    }
}
