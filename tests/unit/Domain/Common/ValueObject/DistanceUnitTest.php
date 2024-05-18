<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Common\ValueObject;

use App\Domain\Common\Exception\DistanceUnitIsNotValidException;
use App\Domain\Common\ValueObject\DistanceUnit;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class DistanceUnitTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $unit): void
    {
        $elapsed_time_unit = ValueObjectMother::makeDistanceUnit($unit);

        $this->assertEquals($unit, $elapsed_time_unit->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'distance unit in km' => [DistanceUnit::KM],
            'distance unit in m' => [DistanceUnit::M]
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(string $unit): void
    {
        $this->expectException(DistanceUnitIsNotValidException::class);
        ValueObjectMother::makeDistanceUnit($unit);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'not existing distance unit time unit' => ["feets"]
        ];
    }
}
