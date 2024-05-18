<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Common\ValueObject;

use App\Domain\Common\Exception\ElapsedTimeUnitIsNotValidException;
use App\Domain\Common\ValueObject\ElapsedTimeUnit;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class ElapsedTimeUnitTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $unit): void
    {
        $elapsed_time_unit = ValueObjectMother::makeElapsedTimeUnit($unit);

        $this->assertEquals($unit, $elapsed_time_unit->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'elapsed time unit in seconds' => [ElapsedTimeUnit::SECOND],
            'elapsed time unit in minutes' => [ElapsedTimeUnit::MINUTE],
            'elapsed time unit in hours' => [ElapsedTimeUnit::HOUR]
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(string $unit): void
    {
        $this->expectException(ElapsedTimeUnitIsNotValidException::class);
        ValueObjectMother::makeElapsedTimeUnit($unit);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'not existing elapsed time unit' => ["feets"]
        ];
    }
}
