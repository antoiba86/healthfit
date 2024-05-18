<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use App\Domain\Activity\Exception\DistanceValueIsNotValidException;

final class DistanceValue extends AbstractIntegerValueObject
{
    public const MIN_VALUE = 0;

    protected function validate(int $value): void
    {
        if ($value < self::MIN_VALUE) {
            throw DistanceValueIsNotValidException::make();
        }
    }
}
