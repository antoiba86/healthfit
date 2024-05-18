<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Common\ValueObject;

use App\Domain\Common\ValueObject\Distance;
use App\Domain\Common\ValueObject\DistanceUnit;
use App\Domain\Common\ValueObject\DistanceValue;
use App\Domain\Common\ValueObject\ElapsedTime;
use App\Domain\Common\ValueObject\ElapsedTimeUnit;
use App\Domain\Common\ValueObject\ElapsedTimeValue;

final class ValueObjectMother
{
    public static function makeDistance(?int $value = null, ?string $unit = null): Distance
    {
        return new Distance(
            self::makeDistanceValue($value),
            self::makeDistanceUnit($unit)
        );
    }

    public static function makeDistanceUnit(?string $unit = null): DistanceUnit
    {
        return new DistanceUnit($unit ?? DistanceUnit::KM);
    }

    public static function makeDistanceValue(?int $value = null): DistanceValue
    {
        return new DistanceValue($value ?? DistanceValue::MIN_VALUE);
    }

    public static function makeElapsedTime(?int $value = null, ?string $unit = null): ElapsedTime
    {
        return new ElapsedTime(
            self::makeElapsedTimeValue($value),
            self::makeElapsedTimeUnit($unit)
        );
    }

    public static function makeElapsedTimeUnit(?string $unit = null): ElapsedTimeUnit
    {
        return new ElapsedTimeUnit($unit ?? ElapsedTimeUnit::SECOND);
    }

    public static function makeElapsedTimeValue(?int $unit = null): ElapsedTimeValue
    {
        return new ElapsedTimeValue($unit ?? ElapsedTimeValue::MIN_VALUE);
    }
}
