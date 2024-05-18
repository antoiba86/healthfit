<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

final class AgeIsNotValidException
{
    private const MESSAGE = 'Age is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
