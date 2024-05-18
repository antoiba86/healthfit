<?php

declare(strict_types=1);

namespace App\Domain\Activity\Exception;

final class DescriptionIsNotValidException
{
    private const MESSAGE = 'Description is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
