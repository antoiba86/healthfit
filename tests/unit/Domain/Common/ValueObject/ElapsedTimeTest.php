<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Common\ValueObject;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\ElapsedTime;
use App\Domain\Common\ValueObject\ElapsedTimeUnit;
use App\Domain\Common\ValueObject\ElapsedTimeValue;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class ElapsedTimeTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        ElapsedTimeValue $value,
        ElapsedTimeUnit $unit
    ): void {
        $distance = ValueObjectMother::makeElapsedTime(
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
                ValueObjectMother::makeElapsedTimeValue(),
                ValueObjectMother::makeElapsedTimeUnit()
            ]
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(
        string $expected_exception,
        string $expected_message,
        ?ElapsedTimeValue $value,
        ?ElapsedTimeUnit $unit
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        ValueObjectMother::makeElapsedTime(
            value: $value,
            unit: $unit
        );
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'Elapsed time value as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(ElapsedTime::ELAPSED_TIME_VALUE)->getMessage(),
                null,
                ValueObjectMother::makeElapsedTimeUnit()
            ],
            'Elapsed time unit as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(ElapsedTime::ELAPSED_TIME_UNIT)->getMessage(),
                ValueObjectMother::makeElapsedTimeValue(),
                null
            ]
        ];
    }
}
