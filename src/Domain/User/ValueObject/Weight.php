<?php

declare(strict_types=1);

namespace App\Domain\User\ValueObject;

use App\Domain\Activity\Exception\WeightIsNotValidException;
use App\Domain\Common\ValueObject\AbstractIntegerValueObject;

final class Weight extends AbstractIntegerValueObject
{
    public const MIN_VALUE = 0;

    protected function validate(int $value): void
    {
        if ($value < self::MIN_VALUE) {
            throw WeightIsNotValidException::make();
        }
    }
}
