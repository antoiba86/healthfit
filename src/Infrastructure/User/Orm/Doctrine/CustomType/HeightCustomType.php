<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Orm\Doctrine\CustomType;

use App\Domain\User\ValueObject\Height;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

final class HeightCustomType extends IntegerType
{
    public function getName(): string
    {
        return 'height';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Height
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : Height::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
