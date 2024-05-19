<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Orm\Doctrine\CustomType;

use App\Domain\Common\ValueObject\ElapsedTimeUnit;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class ElapsedTimeUnitCustomType extends StringType
{
    public function getName(): string
    {
        return 'elapsed_time_type';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?ElapsedTimeUnit
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : ElapsedTimeUnit::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
