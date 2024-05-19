<?php

declare(strict_types=1);

namespace App\Application\Activity\Query\GetActivities;

use App\Domain\Activity\Dto\ActivityDto;
use App\Domain\Activity\Repository\ActivityRepositoryInterface;
use App\Infrastructure\Common\Bus\Query\QueryHandler;

final class GetActivitiesQueryHandler implements QueryHandler
{
    public function __construct(private readonly ActivityRepositoryInterface $repository)
    {
    }

    /**
     * 
     */
    public function __invoke(GetActivitiesQuery $query): array
    {
        $activities = $this->repository->getAll();

        return $this->makeActivityDtoArray($activities);
    }

    private function makeActivityDtoArray(array $activities): array
    {
        $activities_dtos = [];
        foreach ($activities as $activity) {
            $activities_dtos[] = (new ActivityDto(
                $activity->getId(),
                $activity->getType()->getValue(),
                $activity->getName()->getValue(),
                $activity->getDescription()->getValue()
            ))->jsonSerialize();
        }
        return $activities_dtos;
    }
}
