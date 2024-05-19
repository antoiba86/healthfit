<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Session\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use DateTime;
use App\Domain\Common\ValueObject\Distance;
use App\Domain\Common\ValueObject\ElapsedTime;
use App\Domain\Common\ValueObject\Tracking;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;
use PHPUnit\Framework\TestCase as FrameworkTestCase;
use App\Tests\Fixtures\Domain\Session\ValueObject\ValueObjectMother;

final class TrackingTest extends FrameworkTestCase
{
/**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        ?Distance $distance = null,
        ?DateTime $init_date = null,
        ?DateTime $finish_date = null,
        ?ElapsedTime $elapsed_time = null
    ): void {
        $tracking = ValueObjectMother::makeTracking(
            distance: $distance,
            init_date: $init_date,
            finish_date: $finish_date
        );

        $this->assertEquals($distance, $tracking->getDistance());
        $this->assertEquals($init_date, $tracking->getInitDate());
        $this->assertEquals($finish_date, $tracking->getFinishDate());
        $this->assertEquals($elapsed_time, $tracking->getElapsedTime());
    }

    public static function createSuccessfullyProvider(): array
    {
        $init_date = new DateTime();
        $finish_date = (new DateTime())->modify("+30 minutes");
        return [
            [
                CommonValueObjectMother::makeDistance(
                    CommonValueObjectMother::makeDistanceValue(),
                    CommonValueObjectMother::makeDistanceUnit()
                ),
                $init_date,
                $finish_date,
                CommonValueObjectMother::makeElapsedTime(
                    CommonValueObjectMother::makeElapsedTimeValue($finish_date->getTimestamp() - $init_date->getTimestamp()),
                    CommonValueObjectMother::makeElapsedTimeUnit()
                )
            ]
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(
        string $expected_exception,
        string $expected_message,
        ?Distance $distance = null,
        ?DateTime $init_date = null,
        ?DateTime $finish_date = null
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        ValueObjectMother::makeTracking(
            distance: $distance,
            init_date: $init_date,
            finish_date: $finish_date
        );
    }

    public static function createUnsuccessfullyProvider(): array
    {
        $init_date = new DateTime();
        $finish_date = (new DateTime())->modify("+30 minutes");
        return [
            'distance as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Tracking::DISTANCE)->getMessage(),
                null,
                $init_date,
                $finish_date
            ],
            'init date as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Tracking::INIT_DATE)->getMessage(),
                CommonValueObjectMother::makeDistance(
                    CommonValueObjectMother::makeDistanceValue(),
                    CommonValueObjectMother::makeDistanceUnit()
                ),
                null,
                $finish_date
            ],
            'finish date as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Tracking::FINISH_DATE)->getMessage(),
                CommonValueObjectMother::makeDistance(
                    CommonValueObjectMother::makeDistanceValue(),
                    CommonValueObjectMother::makeDistanceUnit()
                ),
                $init_date,
                null
            ]
        ];
    }
}
