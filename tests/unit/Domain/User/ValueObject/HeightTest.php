<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\User\ValueObject;

use App\Domain\User\Exception\HeightIsNotValidException;
use App\Domain\User\ValueObject\Height;
use App\Tests\Fixtures\Domain\User\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class HeightTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(int $value): void
    {
        $height = ValueObjectMother::makeHeight($value);

        $this->assertEquals($value, $height->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'equals to min value' => [Height::MIN_VALUE],
            'min value plus one' => [Height::MIN_VALUE + 1],
            'max value minus one' => [Height::MAX_VALUE - 1],
            'equals to max value' => [Height::MAX_VALUE],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(int $value): void
    {
        $this->expectException(HeightIsNotValidException::class);
        ValueObjectMother::makeHeight($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'shorter than min length' => [Height::MIN_VALUE - 1],
            'larger than max length' => [Height::MAX_VALUE + 1],
        ];
    }
}
