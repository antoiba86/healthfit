<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Orm\Doctrine\CustomType;

use App\Domain\Common\ValueObject\ElapsedTimeValue;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

final class ElapsedTimeValueCustomType extends IntegerType
{
    public function getName(): string
    {
        return 'elapsed_time_value';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?ElapsedTimeValue
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : ElapsedTimeValue::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
