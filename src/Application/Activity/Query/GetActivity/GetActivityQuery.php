<?php

declare(strict_types=1);

namespace App\Application\Activity\Query\GetActivity;

use App\Infrastructure\Common\Bus\Query\Query;

final class GetActivityQuery implements Query
{
    /**
     * @param string[]|null $types
     */
    public function __construct(
        private readonly ?int $id = null
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}