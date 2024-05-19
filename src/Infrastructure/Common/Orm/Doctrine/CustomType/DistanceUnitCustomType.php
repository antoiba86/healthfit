<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Orm\Doctrine\CustomType;

use App\Domain\Common\ValueObject\DistanceUnit;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class DistanceUnitCustomType extends StringType
{
    public function getName(): string
    {
        return 'activity_type';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?DistanceUnit
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : DistanceUnit::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
