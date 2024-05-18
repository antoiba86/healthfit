<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Session\Entity;

use DateTime;
use App\Domain\User\Entity\User;
use App\Domain\Session\Entity\Session;
use App\Domain\Session\Entity\Tracking;
use App\Domain\Activity\Entity\Activity;
use App\Domain\Common\ValueObject\Distance;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother;

final class EntityMother
{
    public static function makeSession(
        ?int $id = null,
        ?User $user = null,
        ?Activity $activity = null,
        ?Tracking $tracking = null
    ): Session {
        return new Session(
            id: $id,
            user: $user,
            activity: $activity,
            tracking: $tracking
        );
    }

    public static function makeTracking(
        ?int $id = null,
        ?Distance $distance = null,
        ?DateTime $init_date = null,
        ?DateTime $finish_date = null
    ): Tracking {
        return new Tracking(
            id: $id,
            distance: $distance,
            init_date: $init_date,
            finish_date: $finish_date
        );
    }

    public static function makeDefaultTracking(): Tracking
    {
        return self::makeTracking(
            1,
            ValueObjectMother::makeDistance(
                ValueObjectMother::makeDistanceValue(),
                ValueObjectMother::makeDistanceUnit()
            ),
            new DateTime(),
            (new DateTime())->modify("+30 minutes")
        );
    }
}
