<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Common\ValueObject;

use App\Domain\Common\Exception\DistanceValueIsNotValidException;
use App\Domain\Common\ValueObject\DistanceValue;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class DistanceValueTest extends TestCase
{
     /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(int $value): void
    {
        $elapsed_time_value = ValueObjectMother::makeDistanceValue($value);

        $this->assertEquals($value, $elapsed_time_value->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'equals to min value' => [DistanceValue::MIN_VALUE],
            'min value plus one' => [DistanceValue::MIN_VALUE + 1],
            'max value minus one' => [DistanceValue::MAX_VALUE - 1],
            'equals to max value' => [DistanceValue::MAX_VALUE],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(int $value): void
    {
        $this->expectException(DistanceValueIsNotValidException::class);
        ValueObjectMother::makeDistanceValue($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'shorter than min length' => [DistanceValue::MIN_VALUE - 1],
            'larger than max length' => [DistanceValue::MAX_VALUE + 1],
        ];
    }
}
