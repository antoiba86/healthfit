<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

final class DistanceValueIsNotValidException
{
    private const MESSAGE = 'Distance value is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
