<?php

declare(strict_types=1);

namespace App\Domain\Common\Exception;

use Exception;

final class ElapsedTimeUnitIsNotValidException extends Exception
{
    private const MESSAGE = 'Elapsed time unit is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
