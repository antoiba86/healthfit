<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\User\ValueObject;

use App\Domain\User\Exception\WeightIsNotValidException;
use App\Domain\User\ValueObject\Weight;
use App\Tests\Fixtures\Domain\User\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class WeightTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(int $value): void
    {
        $weight = ValueObjectMother::makeWeight($value);

        $this->assertEquals($value, $weight->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'equals to min value' => [Weight::MIN_VALUE],
            'min value plus one' => [Weight::MIN_VALUE + 1],
            'max value minus one' => [Weight::MAX_VALUE - 1],
            'equals to max value' => [Weight::MAX_VALUE],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(int $value): void
    {
        $this->expectException(WeightIsNotValidException::class);
        ValueObjectMother::makeWeight($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'shorter than min length' => [Weight::MIN_VALUE - 1],
            'larger than max length' => [Weight::MAX_VALUE + 1],
        ];
    }
}
