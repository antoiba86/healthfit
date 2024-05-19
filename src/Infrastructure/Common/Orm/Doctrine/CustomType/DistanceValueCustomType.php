<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Orm\Doctrine\CustomType;

use App\Domain\Common\ValueObject\DistanceValue;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

final class DistanceValueCustomType extends IntegerType
{
    public function getName(): string
    {
        return 'distance_value';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?DistanceValue
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : DistanceValue::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
