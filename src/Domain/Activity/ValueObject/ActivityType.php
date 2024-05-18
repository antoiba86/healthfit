<?php

declare(strict_types=1);

namespace App\Domain\Activity\ValueObject;

use App\Domain\Activity\Exception\ActivityTypeIsNotValidException;
use App\Domain\Common\ValueObject\AbstractStringValueObject;

final class ActivityType extends AbstractStringValueObject
{
    public const AEROBIC = 'AEROBIC';
    public const STRENGTH = 'STRENGTH';
    public const BALANCE = 'BALANCE';
    public const FLEXIBILITY = 'FLEXIBILITY';
    public const TYPES = [
        self::AEROBIC,
        self::STRENGTH,
        self::BALANCE,
        self::FLEXIBILITY
    ];

    protected function validate(string $value): void
    {
        if (!in_array($value, self::TYPES)) {
            throw ActivityTypeIsNotValidException::make();
        }
    }
}
