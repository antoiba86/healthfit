<?php

declare(strict_types=1);

namespace App\Domain\Session\Repository;

use App\Domain\Session\Entity\Session;

interface SessionRepositoryInterface
{
    public function save(Session $session): void;

    public function getSessionById(int $session_id):  Session;
}
