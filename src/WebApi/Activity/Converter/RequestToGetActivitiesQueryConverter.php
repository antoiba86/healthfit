<?php

declare(strict_types=1);

namespace App\WebApi\Activity\Converter;

use App\Application\Activity\Query\GetActivities\GetActivitiesQuery;
use App\Domain\Activity\Entity\Activity;
use Symfony\Component\HttpFoundation\Request;

final class RequestToGetActivitiesQueryConverter
{
    public function execute(?Request $request): GetActivitiesQuery
    {
        $params = $request->query->all();
        return new GetActivitiesQuery(
            activity_type: $params[Activity::ACTIVITY_TYPE] ?? null
        );
    }
}
