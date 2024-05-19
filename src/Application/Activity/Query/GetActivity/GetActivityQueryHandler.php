<?php

declare(strict_types=1);

namespace App\Application\Activity\Query\GetActivity;

use App\Domain\Activity\Dto\ActivityDto;
use App\Domain\Activity\Exception\ActivityNotExistException;
use App\Domain\Activity\Repository\ActivityRepositoryInterface;
use App\Infrastructure\Common\Bus\Query\QueryHandler;

final class GetActivityQueryHandler implements QueryHandler
{
    public function __construct(private readonly ActivityRepositoryInterface $repository)
    {
    }

    public function __invoke(GetActivityQuery $query): ActivityDto
    {
        $activity = $this->repository->getById($query->getId());

        if (is_null($activity)) {
            throw new ActivityNotExistException();
        }

        return new ActivityDto(
            $activity->getId(),
            $activity->getType()->getValue(),
            $activity->getName()->getValue(),
            $activity->getDescription()->getValue()
        );
    }
}
