<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

final class WeightIsNotValidException
{
    private const MESSAGE = 'Weight is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
