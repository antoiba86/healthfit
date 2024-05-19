<?php

declare(strict_types=1);

namespace App\Domain\Activity\Dto;

use App\Infrastructure\Common\Bus\Query\Response;

final class ActivityDto implements Response
{
    public function __construct(
        private int $id,
        private string $activity_type,
        private string $name,
        private string $description
    ) {
    }

    public function getId(): int
    {
        return $this->id;
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

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'activity_type' => $this->activity_type,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}