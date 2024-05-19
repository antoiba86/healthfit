<?php

declare(strict_types=1);

namespace App\Infrastructure\Activity\Orm\Doctrine\CustomType;

use App\Domain\Activity\ValueObject\ActivityType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class ActivityTypeCustomType extends StringType
{
    public function getName(): string
    {
        return 'activity_type';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?ActivityType
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : ActivityType::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
