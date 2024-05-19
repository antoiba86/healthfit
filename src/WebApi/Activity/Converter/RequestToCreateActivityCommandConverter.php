<?php

declare(strict_types=1);

namespace App\WebApi\Activity\Converter;

use App\Application\Activity\Command\CreateActivity\CreateActivityCommand;
use App\Domain\Activity\Entity\Activity;
use Symfony\Component\HttpFoundation\Request;

final class RequestToCreateActivityCommandConverter
{
    public function execute(Request $request): CreateActivityCommand
    {
        $array = $request->toArray();
        return new CreateActivityCommand(
            $array[Activity::ACTIVITY_TYPE] ?? null,
            $array[Activity::NAME] ?? null,
            $array[Activity::DESCRIPTION] ?? null,
        );
    }
}
