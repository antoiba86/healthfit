<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\User\Entity;

use App\Domain\User\Entity\User;
use App\Domain\User\ValueObject\Age;
use App\Domain\User\ValueObject\Height;
use App\Domain\User\ValueObject\Weight;
use App\Domain\Common\ValueObject\Distance;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;
use App\Tests\Fixtures\Domain\User\ValueObject\ValueObjectMother;

final class EntityMother
{
    public static function makeUser(
        ?int $id = null,
        ?Height $height = null,
        ?Weight $weigth = null,
        ?Age $age = null,
        ?Distance $distance_goal = null
    ): User {
        return new User(
            id: $id,
            height: $height,
            weigth: $weigth,
            age: $age,
            distance_goal: $distance_goal
        );
    }

    public static function makeDefaultUser(): User
    {
        return self::makeUser(
            1,
            ValueObjectMother::makeHeight(),
            ValueObjectMother::makeWeight(),
            ValueObjectMother::makeAge(),
            CommonValueObjectMother::makeDefaultDistance()
        );
    }
}
