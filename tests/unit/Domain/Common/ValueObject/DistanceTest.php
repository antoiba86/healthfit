<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Common\ValueObject;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\Distance;
use App\Domain\Common\ValueObject\DistanceUnit;
use App\Domain\Common\ValueObject\DistanceValue;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class DistanceTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        DistanceValue $value,
        DistanceUnit $unit
    ): void {
        $distance = ValueObjectMother::makeDistance(
            value: $value,
            unit: $unit
        );

        $this->assertEquals($value, $distance->getValue());
        $this->assertEquals($unit, $distance->getUnit());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            [
                ValueObjectMother::makeDistanceValue(),
                ValueObjectMother::makeDistanceUnit()
            ]
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(
        string $expected_exception,
        string $expected_message,
        ?DistanceValue $value,
        ?DistanceUnit $unit
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        ValueObjectMother::makeDistance(
            value: $value,
            unit: $unit
        );
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'Distance value as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Distance::DISTANCE_VALUE)->getMessage(),
                null,
                ValueObjectMother::makeDistanceUnit()
            ],
            'Distance unit as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Distance::DISTANCE_UNIT)->getMessage(),
                ValueObjectMother::makeDistanceValue(),
                null
            ]
        ];
    }
}
