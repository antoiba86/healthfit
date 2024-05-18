<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Activity\ValueObject;

use App\Domain\Activity\Exception\DescriptionIsNotValidException;
use App\Domain\Activity\ValueObject\Description;
use App\Tests\Fixtures\Domain\Activity\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class DescriptionTest extends FrameworkTestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $value): void
    {
        $description = ValueObjectMother::makeDescription($value);

        $this->assertEquals($value, $description->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            "Valid name" => ["Running"],
            'equals to min length' => [str_repeat('s', Description::MIN_LENGTH)],
            'min length plus one' => [str_repeat('s', Description::MIN_LENGTH + 1)],
            'max length minus one' => [str_repeat('s', Description::MAX_LENGTH - 1)],
            'equals to max length' => [str_repeat('s', Description::MAX_LENGTH)],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(?string $value): void
    {
        $this->expectException(DescriptionIsNotValidException::class);
        ValueObjectMother::makeDescription($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'empty string' => [''],
            'blank space' => [' '],
            'max length plus one' => [str_repeat('s', Description::MAX_LENGTH + 1)],
        ];
    }
}
