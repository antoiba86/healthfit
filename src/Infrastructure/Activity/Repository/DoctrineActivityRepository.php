<?php

declare(strict_types=1);

namespace App\Infrastructure\Activity\Repository;

use App\Domain\Activity\Entity\Activity;
use App\Domain\Activity\Repository\ActivityRepositoryInterface;
use App\Domain\Activity\ValueObject\ActivityType;
use App\Domain\Session\Entity\Session;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineActivityRepository extends ServiceEntityRepository implements ActivityRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activity::class);
    }

    public function save(Activity $activity): void
    {
        $this->getEntityManager()->persist($activity);
    }

    public function getById(int $id): ?Activity
    {
        return $this->getEntityManager()->find(Activity::class, $id);
    }

    public function getListByActivityType(string $type): array
    {
        return $this->getEntityManager()->getRepository(Activity::class)->findBy(["activity_type" => $type]);
    }

    public function getAll(): array
    {
        return $this->getEntityManager()->getRepository(Activity::class)->findAll();
    }

    public function getNextId(): int
    {
        $last_activity = $this->getEntityManager()->getRepository(Activity::class)->findOneBy([], ['id' => 'desc']);
        return $last_activity?->getId() + 1 ?? 1;
    }
}
