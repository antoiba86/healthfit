<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

final class ElapsedTimeUnitIsNotValidException
{
    private const MESSAGE = 'Elapsed time unit is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
