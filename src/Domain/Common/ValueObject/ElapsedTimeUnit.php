<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use App\Domain\Common\Exception\ElapsedTimeUnitIsNotValidException;

final class ElapsedTimeUnit extends AbstractStringValueObject
{
    public const SECOND = 'SECOND';
    public const MINUTE = 'MINUTE';
    public const HOUR = 'HOUR';
    public const UNITS = [
        self::SECOND,
        self::MINUTE,
        self::HOUR
    ];

    protected function validate(string $value): void
    {
        if (!in_array($value, self::UNITS)) {
            throw ElapsedTimeUnitIsNotValidException::make();
        }
    }
}
