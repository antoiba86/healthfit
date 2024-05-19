<?php

declare(strict_types=1);

namespace App\Domain\Session\Repository;

use App\Domain\Session\Entity\Session;

interface SessionRepositoryInterface
{
    public function save(Session $session): void;

    public function getById(int $id):  ?Session;
        
    public function getTotalDistanceAccumulatedByActivityType(string $activity_type): array;

    public function getTotalElapsedTimeByActivityType(string $activity_type): array;
}
