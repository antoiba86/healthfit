<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;

final class ElapsedTime
{
    public const ELAPSED_TIME_VALUE = 'elapsed_time_value';
    public const ELAPSED_TIME_UNIT = 'elapsed_time_unit';

    private ElapsedTimeValue $value;
    private ElapsedTimeUnit $unit;

    public function __construct(
        ?ElapsedTimeValue $value,
        ?ElapsedTimeUnit $unit
    ) {
        $this->setValue($value);
        $this->setUnit($unit);
    }

    public function getValue(): ElapsedTimeValue
    {
        return $this->value;
    }

    public function setValue(?ElapsedTimeValue $value): void
    {
        if (is_null($value)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::ELAPSED_TIME_VALUE);
        }
        $this->value = $value;
    }

    public function getUnit(): ElapsedTimeUnit
    {
        return $this->unit;
    }

    public function setUnit(?ElapsedTimeUnit $unit): void
    {
        if (is_null($unit)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::ELAPSED_TIME_UNIT);
        }
        $this->unit = $unit;
    }
}
