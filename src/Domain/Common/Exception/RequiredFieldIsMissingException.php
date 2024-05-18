<?php

declare(strict_types=1);

namespace App\Domain\Common\Exception;

use Exception;

final class RequiredFieldIsMissingException extends Exception
{
    private const MESSAGE = 'Required field "%s" is missing';

    public static function makeByFieldName(string $field): self
    {
        return new self(sprintf(self::MESSAGE, $field));
    }
}
