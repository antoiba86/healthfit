<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Application\Activity\Command;

use App\Application\Activity\Command\CreateActivity\CreateActivityCommand;
use App\Application\Activity\Command\CreateActivity\CreateActivityCommandHandler;
use App\Domain\Activity\Repository\ActivityRepositoryInterface;

final class CommandObjectMother
{
    public static function makeCreateActivityCommand(
        ?string $activity_type = null,
        ?string $name = null,
        ?string $description = null
    ): CreateActivityCommand {
        return new CreateActivityCommand(
            activity_type: $activity_type,
            name: $name,
            description: $description
        );
    }

    public static function makeCreateActivityCommandHandler(ActivityRepositoryInterface $repository): CreateActivityCommandHandler
    {
        return new CreateActivityCommandHandler($repository);
    }
}