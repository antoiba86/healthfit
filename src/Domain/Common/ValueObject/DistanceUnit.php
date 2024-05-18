<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use App\Domain\Activity\Exception\DistanceUnitIsNotValidException;

final class DistanceUnit extends AbstractStringValueObject
{
    public const KM = 'KM';
    public const M = 'M';
    public const TYPES = [
        self::KM,
        self::M
    ];

    protected function validate(string $value): void
    {
        if (!in_array($value, self::TYPES)) {
            throw DistanceUnitIsNotValidException::make();
        }
    }
}
