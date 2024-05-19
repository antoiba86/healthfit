<?php

declare(strict_types=1);

namespace App\Application\Activity\Command\CreateActivity;

use App\Domain\Activity\Entity\Activity;
use App\Domain\Activity\Repository\ActivityRepositoryInterface;
use App\Domain\Activity\ValueObject\ActivityType;
use App\Domain\Activity\ValueObject\Description;
use App\Domain\Activity\ValueObject\Name;
use App\Infrastructure\Common\Bus\Command\CommandHandler;

final class CreateActivityCommandHandler implements CommandHandler
{
    public function __construct(private readonly ActivityRepositoryInterface $repository)
    {
    }

    public function __invoke(CreateActivityCommand $command): void
    {
        $last_id = $this->repository->getNextId();

        $activity = new Activity(
            $last_id,
            ActivityType::tryFrom($command->getActivityType()),
            Name::tryFrom($command->getName()),
            Description::tryFrom($command->getDescription()),
        );

        $this->repository->save($activity);
    }
}
