<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Session\ValueObject;

use DateTime;
use App\Domain\Common\ValueObject\Distance;
use App\Domain\Session\ValueObject\Tracking;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;

final class ValueObjectMother
{
    public static function makeTracking(
        ?Distance $distance = null,
        ?DateTime $init_date = null,
        ?DateTime $finish_date = null
    ): Tracking {
        return new Tracking(
            distance: $distance,
            init_date: $init_date,
            finish_date: $finish_date
        );
    }

    public static function makeDefaultTracking(): Tracking
    {
        return self::makeTracking(
            CommonValueObjectMother::makeDistance(
                CommonValueObjectMother::makeDistanceValue(),
                CommonValueObjectMother::makeDistanceUnit()
            ),
            new DateTime(),
            (new DateTime())->modify("+30 minutes")
        );
    }
}
