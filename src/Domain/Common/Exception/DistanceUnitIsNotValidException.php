<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

final class DistanceUnitIsNotValidException
{
    private const MESSAGE = 'Distance unit is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
