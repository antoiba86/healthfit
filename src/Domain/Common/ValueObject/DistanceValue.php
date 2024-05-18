<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use App\Domain\Common\Exception\DistanceValueIsNotValidException;

final class DistanceValue extends AbstractIntegerValueObject
{
    public const MIN_VALUE = 0;
    public const MAX_VALUE = 999999999;

    protected function validate(int $value): void
    {
        if (!$this->isIntegerBetweenValues($value, self::MIN_VALUE, self::MAX_VALUE)) {
            throw DistanceValueIsNotValidException::make();
        }
    }
}
