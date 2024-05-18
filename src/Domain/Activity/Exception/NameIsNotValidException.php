<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

use Exception;

final class NameIsNotValidException extends Exception
{
    private const MESSAGE = 'Name is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
