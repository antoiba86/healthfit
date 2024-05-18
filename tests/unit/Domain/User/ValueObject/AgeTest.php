<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\User\ValueObject;

use App\Domain\User\Exception\AgeIsNotValidException;
use App\Domain\User\ValueObject\Age;
use App\Tests\Fixtures\Domain\User\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class AgeTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(int $value): void
    {
        $age = ValueObjectMother::makeAge($value);

        $this->assertEquals($value, $age->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'equals to min value' => [Age::MIN_VALUE],
            'min value plus one' => [Age::MIN_VALUE + 1],
            'max value minus one' => [Age::MAX_VALUE - 1],
            'equals to max value' => [Age::MAX_VALUE],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(int $value): void
    {
        $this->expectException(AgeIsNotValidException::class);
        ValueObjectMother::makeAge($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'shorter than min length' => [Age::MIN_VALUE - 1],
            'larger than max length' => [Age::MAX_VALUE + 1],
        ];
    }
}
