<?php

declare(strict_types=1);

namespace App\Domain\User\ValueObject;

use App\Domain\User\Exception\WeightIsNotValidException;
use App\Domain\Common\ValueObject\AbstractIntegerValueObject;

final class Weight extends AbstractIntegerValueObject
{
    public const MIN_VALUE = 1;
    public const MAX_VALUE = 999;

    protected function validate(int $value): void
    {
        if (!$this->isIntegerBetweenValues($value, self::MIN_VALUE, self::MAX_VALUE)) {
            throw WeightIsNotValidException::make();
        }
    }
}
