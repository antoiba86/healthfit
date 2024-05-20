<?php

namespace App\Tests\Fixtures\Domain\Activity\Entity;

use App\Domain\Activity\Entity\Activity;
use App\Domain\Activity\ValueObject\ActivityType;
use App\Domain\Activity\ValueObject\Description;
use App\Domain\Activity\ValueObject\Name;
use App\Tests\Fixtures\Domain\Activity\ValueObject\ValueObjectMother;

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

    public static function makeDefaultActivity(
        ?int $id = null,
        ?ActivityType $activity_type = null,
        ?Name $name = null,
        ?Description $description = null
    ): Activity
    {
        return self::makeActivity(
            $id ?? 1,
            $activity_type ?? ValueObjectMother::makeActivityType(),
            $name ?? ValueObjectMother::makeName(),
            $description ?? ValueObjectMother::makeDescription()
        );
    }
}
