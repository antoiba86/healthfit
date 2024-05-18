<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Activity\ValueObject;

use App\Domain\Activity\Exception\NameIsNotValidException;
use App\Domain\Activity\ValueObject\Name;
use App\Tests\Fixtures\Domain\Activity\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class NameTest extends FrameworkTestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $value): void
    {
        $name = ValueObjectMother::makeName($value);

        $this->assertEquals($value, $name->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            "Valid name" => ["Running"],
            'equals to min length' => [str_repeat('s', Name::MIN_LENGTH)],
            'min length plus one' => [str_repeat('s', Name::MIN_LENGTH + 1)],
            'max length minus one' => [str_repeat('s', Name::MAX_LENGTH - 1)],
            'equals to max length' => [str_repeat('s', Name::MAX_LENGTH)],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(?string $value): void
    {
        $this->expectException(NameIsNotValidException::class);
        ValueObjectMother::makeName($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'empty string' => [''],
            'blank space' => [' '],
            'max length plus one' => [str_repeat('s', Name::MAX_LENGTH + 1)],
        ];
    }
}
