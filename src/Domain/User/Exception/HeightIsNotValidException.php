<?php

declare(strict_types=1);

namespace App\Domain\User\Exception;

use Exception;

final class HeightIsNotValidException extends Exception
{
    private const MESSAGE = 'Height is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
