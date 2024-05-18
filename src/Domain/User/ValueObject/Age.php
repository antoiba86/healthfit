<?php

declare(strict_types=1);

namespace App\Domain\User\ValueObject;

use App\Domain\User\Exception\AgeIsNotValidException;
use App\Domain\Common\ValueObject\AbstractIntegerValueObject;

final class Age extends AbstractIntegerValueObject
{
    public const MIN_VALUE = 0;
    public const MAX_VALUE = 999;

    protected function validate(int $value): void
    {
        if (!$this->isIntegerBetweenValues($value, self::MIN_VALUE, self::MAX_VALUE)) {
            throw AgeIsNotValidException::make();
        }
    }
}
