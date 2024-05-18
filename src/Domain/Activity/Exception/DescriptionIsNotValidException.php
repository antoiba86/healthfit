<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

use Exception;

final class DescriptionIsNotValidException extends Exception
{
    private const MESSAGE = 'Description is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
