<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Application\Activity\Query;

use App\Domain\Activity\Repository\ActivityRepositoryInterface;
use App\Application\Activity\Query\GetActivity\GetActivityQuery;
use App\Application\Activity\Query\GetActivities\GetActivitiesQuery;
use App\Application\Activity\Query\GetActivity\GetActivityQueryHandler;
use App\Application\Activity\Query\GetActivities\GetActivitiesQueryHandler;

final class QueryObjectMother
{
    public static function makeGetActivityQuery(
        ?int $id = null,
    ): GetActivityQuery {
        return new GetActivityQuery(
            id: $id
        );
    }

    public static function makeGetActivityQueryHandler(ActivityRepositoryInterface $repository): GetActivityQueryHandler
    {
        return new GetActivityQueryHandler($repository);
    }

    public static function makeGetActivitiesQuery(
        ?string $activity_type = null,
    ): GetActivitiesQuery {
        return new GetActivitiesQuery(
            activity_type: $activity_type
        );
    }

    public static function makeGetActivitiesQueryHandler(ActivityRepositoryInterface $repository): GetActivitiesQueryHandler
    {
        return new GetActivitiesQueryHandler($repository);
    }
}