<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

use Exception;

final class ActivityNotExistException extends Exception
{
    private const MESSAGE = "This isn't the activity you're looking for";

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
