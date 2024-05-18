<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;

final class Distance
{
    public const DISTANCE_VALUE = 'distance_value';
    public const DISTANCE_UNIT = 'distance_unit';

    private DistanceValue $value;
    private DistanceUnit $unit;

    public function __construct(
        ?DistanceValue $value,
        ?DistanceUnit $unit
    ) {
        $this->setValue($value);
        $this->setUnit($unit);
    }

    public function getValue(): DistanceValue
    {
        return $this->value;
    }

    public function setValue(?DistanceValue $value): void
    {
        if (is_null($value)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::DISTANCE_VALUE);
        }
        $this->value = $value;
    }

    public function getUnit(): DistanceUnit
    {
        return $this->unit;
    }

    public function setUnit(?DistanceUnit $unit): void
    {
        if (is_null($unit)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::DISTANCE_UNIT);
        }
        $this->unit = $unit;
    }
}
