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
    public const WEIGHT = 'weigth';
    public const AGE = 'age';
    public const DISTANCE_GOAL = 'distance_goal';

    private int $id;
    private Height $height;
    private Weight $weigth;
    private Age $age;
    private Distance $distance_goal;
    public function __construct(
        ?int $id = null,
        ?Height $height = null,
        ?Weight $weigth = null,
        ?Age $age = null,
        ?Distance $distance_goal = null
    ) {
        
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

    public function getWeigth(): Weight
    {
        return $this->weigth;
    }

    public function setWeigth($weigth): void
    {
        if (is_null($weigth)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::WEIGHT);
        }

        $this->weigth = $weigth;
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

    public function getDistance_goal(): Distance
    {
        return $this->distance_goal;
    }

    public function setDistance_goal($distance_goal): void
    {
        if (is_null($distance_goal)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::DISTANCE_GOAL);
        }

        $this->distance_goal = $distance_goal;
    }
}
