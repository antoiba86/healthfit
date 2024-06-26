<?php

declare(strict_types=1);

namespace App\Domain\Activity\Repository;

use App\Domain\Activity\Entity\Activity;
use App\Domain\Activity\ValueObject\ActivityType;

interface ActivityRepositoryInterface
{
    public function save(Activity $activity): void;

    public function getById(int $id): ?Activity;

    public function getListByActivityType(ActivityType $type): array;

    public function getAll(): array;

    public function getNextId(): int;
}
