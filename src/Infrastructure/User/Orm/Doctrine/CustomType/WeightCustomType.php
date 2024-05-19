<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Orm\Doctrine\CustomType;

use App\Domain\User\ValueObject\Weight;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

final class WeightCustomType extends IntegerType
{
    public function getName(): string
    {
        return 'weight';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Weight
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : Weight::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
