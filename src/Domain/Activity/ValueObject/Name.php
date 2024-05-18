<?php

declare(strict_types=1);

namespace App\Domain\Activity\ValueObject;

use App\Domain\Activity\Exception\NameIsNotValidException;
use App\Domain\Common\ValueObject\AbstractStringValueObject;

final class Name extends AbstractStringValueObject
{
    public const MIN_LENGTH = 1;
    public const MAX_LENGTH = 50;

    protected function validate(string $value): void
    {
        if (
            $this->isEmptyString($value)
            || !$this->isLengthBetweenValues($value, static::MIN_LENGTH, static::MAX_LENGTH)
        ) {
            throw NameIsNotValidException::make();
        }
    }
}
