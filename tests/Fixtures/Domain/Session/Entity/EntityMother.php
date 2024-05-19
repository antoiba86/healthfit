<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Session\Entity;

use App\Domain\User\Entity\User;
use App\Domain\Session\Entity\Session;
use App\Domain\Common\ValueObject\Tracking;
use App\Domain\Activity\Entity\Activity;

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
}
