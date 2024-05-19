<?php

declare(strict_types=1);

namespace App\Infrastructure\Activity\Orm\Doctrine\CustomType;

use App\Domain\Activity\ValueObject\Name;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class NameCustomType extends StringType
{
    public function getName(): string
    {
        return 'name';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Name
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : Name::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
