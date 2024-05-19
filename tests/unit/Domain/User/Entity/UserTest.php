<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\User\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\User\ValueObject\Age;
use App\Domain\User\ValueObject\Height;
use App\Domain\User\ValueObject\Weight;
use App\Domain\Common\ValueObject\Distance;
use App\Domain\User\Entity\User;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;
use App\Tests\Fixtures\Domain\User\Entity\EntityMother;
use App\Tests\Fixtures\Domain\User\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

final class UserTest extends FrameworkTestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        ?int $id = null,
        ?Height $height = null,
        ?Weight $weight = null,
        ?Age $age = null,
        ?Distance $distance_goal = null
    ): void {
        $user = EntityMother::makeUser(
            id: $id,
            height: $height,
            weight: $weight,
            age: $age,
            distance_goal: $distance_goal
        );

        $this->assertEquals($id, $user->getId());
        $this->assertEquals($height, $user->getHeight());
        $this->assertEquals($weight, $user->getWeight());
        $this->assertEquals($age, $user->getAge());
        $this->assertEquals($distance_goal, $user->getDistanceGoal());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            [
                1,
                ValueObjectMother::makeHeight(),
                ValueObjectMother::makeWeight(),
                ValueObjectMother::makeAge(),
                CommonValueObjectMother::makeDistance(
                    CommonValueObjectMother::makeDistanceValue(),
                    CommonValueObjectMother::makeDistanceUnit()
                )
            ]
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(
        string $expected_exception,
        string $expected_message,
        ?int $id = null,
        ?Height $height = null,
        ?Weight $weight = null,
        ?Age $age = null,
        ?Distance $distance_goal = null
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        EntityMother::makeUser(
            id: $id,
            height: $height,
            weight: $weight,
            age: $age,
            distance_goal: $distance_goal
        );
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'id as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(User::ID)->getMessage(),
                null,
                ValueObjectMother::makeHeight(),
                ValueObjectMother::makeWeight(),
                ValueObjectMother::makeAge(),
                CommonValueObjectMother::makeDistance(
                    CommonValueObjectMother::makeDistanceValue(),
                    CommonValueObjectMother::makeDistanceUnit()
                )
            ],
            'height as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(User::HEIGHT)->getMessage(),
                1,
                null,
                ValueObjectMother::makeWeight(),
                ValueObjectMother::makeAge(),
                CommonValueObjectMother::makeDistance(
                    CommonValueObjectMother::makeDistanceValue(),
                    CommonValueObjectMother::makeDistanceUnit()
                )
            ],
            'weight as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(User::WEIGHT)->getMessage(),
                1,
                ValueObjectMother::makeHeight(),
                null,
                ValueObjectMother::makeAge(),
                CommonValueObjectMother::makeDistance(
                    CommonValueObjectMother::makeDistanceValue(),
                    CommonValueObjectMother::makeDistanceUnit()
                )
            ],
            'Age as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(User::AGE)->getMessage(),
                1,
                ValueObjectMother::makeHeight(),
                ValueObjectMother::makeWeight(),
                null,
                CommonValueObjectMother::makeDistance(
                    CommonValueObjectMother::makeDistanceValue(),
                    CommonValueObjectMother::makeDistanceUnit()
                )
            ],
            'goal distance as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(User::DISTANCE_GOAL)->getMessage(),
                1,
                ValueObjectMother::makeHeight(),
                ValueObjectMother::makeWeight(),
                ValueObjectMother::makeAge(),
                null
            ],
        ];
    }
}
