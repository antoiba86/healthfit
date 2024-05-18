<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

final class HeightIsNotValidException
{
    private const MESSAGE = 'Height is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
