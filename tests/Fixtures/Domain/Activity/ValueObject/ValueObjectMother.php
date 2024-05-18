<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Activity\ValueObject;

use App\Domain\Activity\ValueObject\ActivityType;
use App\Domain\Activity\ValueObject\Description;
use App\Domain\Activity\ValueObject\Name;

final class ValueObjectMother
{
    public static function makeActivityType(?string $type = null): ActivityType
    {
        return new ActivityType($type ?? ActivityType::AEROBIC);
    }

    public static function makeName(?string $name = null): Name
    {
        return new Name($name ?? "Running");
    }

    public static function makeDescription(?string $description = null): Description
    {
        return new Description($description ?? "Running is aerobic if you're keeping your pace and energy expenditure fairly consistent");
    }
}
