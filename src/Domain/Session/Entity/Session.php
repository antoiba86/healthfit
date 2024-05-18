<?php

declare(strict_types=1);

namespace App\Domain\Session\Entity;

use App\Domain\Activity\Entity\Activity;
use App\Domain\Session\Entity\Tracking;
use App\Domain\User\Entity\User;

final class Session
{
    public function __construct(
        private int $id,
        private User $user,
        private Activity $activity,
        private Tracking $tracking
    )
    {
    }
}
