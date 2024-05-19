<?php

declare(strict_types=1);

namespace App\Infrastructure\Activity\Repository;

use App\Domain\Session\Entity\Session;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Session\Repository\SessionRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

final class DoctrineSessionRepository extends ServiceEntityRepository implements SessionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Session::class);
    }

    public function save(Session $session): void
    {
        $this->getEntityManager()->persist($session);
    }

    public function getById(int $id): ?Session
    {
        return $this->getEntityManager()->find(Session::class, $id);
    }
    
    public function getTotalDistanceAccumulatedByActivityType(string $activity_type): array
    {
        return $this->getEntityManager()
        ->getRepository(Session::class)
        ->createQueryBuilder('s')
        ->join('s.activity_id', 'a')
        ->where(["a.activity_type" => $activity_type])
        ->getQuery()
        ->getResult();
    }

    public function getTotalElapsedTimeByActivityType(string $activity_type): array
    {
        return $this->getEntityManager()
        ->getRepository(Session::class)
        ->createQueryBuilder('s')
        ->join('s.activity_id', 'a')
        ->where(["a.activity_type" => $activity_type])
        ->getQuery()
        ->getResult();
    }
}
