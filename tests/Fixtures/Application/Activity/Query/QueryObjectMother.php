<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Application\Activity\Query;

use App\Application\Activity\Query\GetActivity\GetActivityQuery;
use App\Application\Activity\Query\GetActivity\GetActivityQueryHandler;
use App\Domain\Activity\Repository\ActivityRepositoryInterface;

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
}