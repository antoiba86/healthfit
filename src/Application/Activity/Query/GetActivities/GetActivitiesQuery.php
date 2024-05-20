<?php

declare(strict_types=1);

namespace App\Application\Activity\Query\GetActivities;

use App\Infrastructure\Common\Bus\Query\Query;

final class GetActivitiesQuery implements Query
{
    public function __construct(
        private readonly ?string $activity_type = null
    ) {
    }

    public function getActivityType(): ?string
    {
        return $this->activity_type;
    }
}