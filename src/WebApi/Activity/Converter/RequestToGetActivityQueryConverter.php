<?php

declare(strict_types=1);

namespace App\WebApi\Activity\Converter;

use App\Application\Activity\Query\GetActivity\GetActivityQuery;

final class RequestToGetActivityQueryConverter
{
    public function execute(int $id): GetActivityQuery
    {
        return new GetActivityQuery(
            $id ?? null
        );
    }
}
