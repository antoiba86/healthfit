<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Activity\Entity;

use App\Domain\Activity\Entity\Activity;
use App\Domain\Activity\ValueObject\ActivityType;
use App\Domain\Activity\ValueObject\Description;
use App\Domain\Activity\ValueObject\Name;
use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Tests\Fixtures\Domain\Activity\Entity\EntityMother;
use App\Tests\Fixtures\Domain\Activity\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

final class ActivityTest extends FrameworkTestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        int $id,
        ActivityType $activity_type,
        Name $name,
        Description $description
    ): void {
        $activity = EntityMother::makeActivity(
            id: $id,
            activity_type: $activity_type,
            name: $name,
            description: $description
        );

        $this->assertEquals($id, $activity->getId());
        $this->assertEquals($activity_type, $activity->getType());
        $this->assertEquals($name, $activity->getName());
        $this->assertEquals($description, $activity->getDescription());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            [
                1,
                ValueObjectMother::makeActivityType(),
                ValueObjectMother::makeName(),
                ValueObjectMother::makeDescription()
            ]
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(
        string $expected_exception,
        string $expected_message,
        ?int $id,
        ?ActivityType $activity_type,
        ?Name $name,
        ?Description $description
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        $activity = EntityMother::makeActivity(
            id: $id,
            activity_type: $activity_type,
            name: $name,
            description: $description
        );
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'id as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Activity::ID)->getMessage(),
                null,
                ValueObjectMother::makeActivityType(),
                ValueObjectMother::makeName(),
                ValueObjectMother::makeDescription()
            ],
            'activity type as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Activity::ACTIVITY_TYPE)->getMessage(),
                1,
                null,
                ValueObjectMother::makeName(),
                ValueObjectMother::makeDescription()
            ],
            'name as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Activity::NAME)->getMessage(),
                1,
                ValueObjectMother::makeActivityType(),
                null,
                ValueObjectMother::makeDescription()
            ],
            'description as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Activity::DESCRIPTION)->getMessage(),
                1,
                ValueObjectMother::makeActivityType(),
                ValueObjectMother::makeName(),
                null
            ]
        ];
    }
}
