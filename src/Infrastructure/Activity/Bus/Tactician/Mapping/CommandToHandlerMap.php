<?php

declare(strict_types=1);

namespace App\Infrastructure\Pokemon\Bus\Tactician\Mapping;

use App\Application\Activity\Command\CreateActivity\CreateActivityCommand;
use App\Application\Activity\Command\CreateActivity\CreateActivityCommandHandler;
use App\Infrastructure\Common\Bus\Tactician\Mapping\CommandToHandlerMapInterface;

final class CommandToHandlerMap implements CommandToHandlerMapInterface
{
    /**
     * @inheritDoc
     */
    public function get(): array
    {
        return [
            CreateActivityCommand::class => CreateActivityCommandHandler::class,
        ];
    }
}
