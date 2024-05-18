<?php

declare(strict_types=1);

namespace App\Domain\User\Exception;

use Exception;

final class AgeIsNotValidException extends Exception
{
    private const MESSAGE = 'Age is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
