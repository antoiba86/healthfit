<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

final class ElapsedTimeValueIsNotValidException
{
    private const MESSAGE = 'Elapsed time value is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
