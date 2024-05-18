<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

use Exception;

final class ActivityTypeIsNotValidException extends Exception
{
    private const MESSAGE = 'Activity type is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
