<?php

declare(strict_types=1);

namespace App\Infrastructure\Activity\Orm\Doctrine\CustomType;

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use App\Domain\Activity\ValueObject\Description;

final class DescriptionCustomType extends StringType
{
    public function getDescription(): string
    {
        return 'description';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Description
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : Description::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->toArray();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
