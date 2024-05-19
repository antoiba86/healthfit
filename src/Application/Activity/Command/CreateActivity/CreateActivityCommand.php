<?php

declare(strict_types=1);

namespace App\Application\Activity\Command\CreateActivity;

use App\Infrastructure\Common\Bus\Command\Command;

final class CreateActivityCommand implements Command
{
    /**
     * @param string[]|null $types
     */
    public function __construct(
        private readonly ?string $activity_type = null,
        private readonly ?string $name = null,
        private readonly ?string $description = null
    ) {
    }

    public function getActivityType(): string
    {
            return $this->activity_type;
    }

    public function getName(): string
    {
            return $this->name;
    }

    public function getDescription(): string
    {
            return $this->description;
    }
}