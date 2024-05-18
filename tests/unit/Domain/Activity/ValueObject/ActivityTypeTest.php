<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Activity\ValueObject;

use App\Domain\Activity\Exception\ActivityTypeIsNotValidException;
use App\Domain\Activity\ValueObject\ActivityType;
use App\Tests\Fixtures\Domain\Activity\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class ActivityTypeTest extends FrameworkTestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $value): void
    {
        $type = ValueObjectMother::makeActivityType($value);

        $this->assertEquals($value, $type->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return array_map(fn(string $type): array => [$type], ActivityType::TYPES);
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(?string $value): void
    {
        $this->expectException(ActivityTypeIsNotValidException::class);
        ValueObjectMother::makeActivityType($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'empty string' => [''],
            'blank space' => [' '],
            'type not allowed' => ['FOOTBALL'],
        ];
    }
}
