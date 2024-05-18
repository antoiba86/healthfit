<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\User\ValueObject;

use App\Domain\User\ValueObject\Age;
use App\Domain\User\ValueObject\Height;
use App\Domain\User\ValueObject\Weight;

final class ValueObjectMother
{
    public static function makeAge(?int $age = null): Age
    {
        return new Age($age ?? 20);
    }

    public static function makeWeight(?int $weight = null): Weight
    {
        return new Weight($weight ?? 90);
    }

    public static function makeHeight(?int $height = null): Height
    {
        return new Height($height ?? 190);
    }
}
