<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

final class NameIsNotValidException
{
    private const MESSAGE = 'Name is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
