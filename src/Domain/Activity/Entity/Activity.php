<?php

declare(strict_types=1);

namespace App\Domain\Activity\Entity;

use App\Domain\Activity\ValueObject\Description;
use App\Domain\Activity\ValueObject\Name;
use App\Domain\Activity\ValueObject\ActivityType;
use App\Domain\Common\Exception\RequiredFieldIsMissingException;

class Activity
{
    public const ID = 'id';
    public const ACTIVITY_TYPE = 'activity_type';
    public const NAME = 'name';
    public const DESCRIPTION = 'description';

    private int $id;
    private ActivityType $type;
    private Name $name;
    private Description $description;

    public function __construct(
        ?int $id = null,
        ?ActivityType $type = null,
        ?Name $name = null,
        ?Description $description = null
    ) {
        $this->setId($id);
        $this->setType($type);
        $this->setName($name);
        $this->setDescription($description);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        if (is_null($id)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::ID);
        }
        $this->id = $id;
    }

    public function getType(): ActivityType
    {
        return $this->type;
    }

    public function setType($type): void
    {
        if (is_null($type)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::ACTIVITY_TYPE);
        }
        $this->type = $type;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function setName($name): void
    {
        if (is_null($name)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::NAME);
        }
        $this->name = $name;
    }

    public function getDescription(): Description
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        if (is_null($description)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::DESCRIPTION);
        }
        $this->description = $description;
    }
}
