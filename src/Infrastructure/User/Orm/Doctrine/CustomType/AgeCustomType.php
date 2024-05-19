<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Orm\Doctrine\CustomType;

use App\Domain\User\ValueObject\Age;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

final class AgeCustomType extends IntegerType
{
    public function getName(): string
    {
        return 'age';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Age
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : Age::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
