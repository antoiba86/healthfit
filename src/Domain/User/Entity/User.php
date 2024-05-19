<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\Distance;
use App\Domain\User\Entity\Goal;
use App\Domain\User\ValueObject\Age;
use App\Domain\User\ValueObject\Height;
use App\Domain\User\ValueObject\Weight;

final class User
{
    public const ID = 'id';
    public const HEIGHT = 'height';
    public const WEIGHT = 'weight';
    public const AGE = 'age';
    public const DISTANCE_GOAL = 'distance_goal';

    private int $id;
    private Height $height;
    private Weight $weight;
    private Age $age;
    private Distance $distance_goal;
    public function __construct(
        ?int $id = null,
        ?Height $height = null,
        ?Weight $weight = null,
        ?Age $age = null,
        ?Distance $distance_goal = null
    ) {
        $this->setId($id);
        $this->setHeight($height);
        $this->setWeight($weight);
        $this->setAge($age);
        $this->setDistanceGoal($distance_goal);
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

    public function getHeight(): Height
    {
        return $this->height;
    }

    public function setHeight($height): void
    {
        if (is_null($height)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::HEIGHT);
        }

        $this->height = $height;
    }

    public function getWeight(): Weight
    {
        return $this->weight;
    }

    public function setWeight($weight): void
    {
        if (is_null($weight)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::WEIGHT);
        }

        $this->weight = $weight;
    }

    public function getAge(): Age
    {
        return $this->age;
    }

    public function setAge($age): void
    {
        if (is_null($age)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::AGE);
        }

        $this->age = $age;
    }

    public function getDistanceGoal(): Distance
    {
        return $this->distance_goal;
    }

    public function setDistanceGoal($distance_goal): void
    {
        if (is_null($distance_goal)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::DISTANCE_GOAL);
        }

        $this->distance_goal = $distance_goal;
    }
}
