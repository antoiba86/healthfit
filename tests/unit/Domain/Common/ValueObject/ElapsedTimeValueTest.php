<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Common\ValueObject;

use App\Domain\Common\Exception\ElapsedTimeValueIsNotValidException;
use App\Domain\Common\ValueObject\ElapsedTimeValue;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class ElapsedTimeValueTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(int $value): void
    {
        $elapsed_time_value = ValueObjectMother::makeElapsedTimeValue($value);

        $this->assertEquals($value, $elapsed_time_value->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'equals to min value' => [ElapsedTimeValue::MIN_VALUE],
            'min value plus one' => [ElapsedTimeValue::MIN_VALUE + 1],
            'max value minus one' => [ElapsedTimeValue::MAX_VALUE - 1],
            'equals to max value' => [ElapsedTimeValue::MAX_VALUE],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(int $value): void
    {
        $this->expectException(ElapsedTimeValueIsNotValidException::class);
        ValueObjectMother::makeElapsedTimeValue($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'shorter than min length' => [ElapsedTimeValue::MIN_VALUE - 1],
            'larger than max length' => [ElapsedTimeValue::MAX_VALUE + 1],
        ];
    }
}
