<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Session\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use DateTime;
use App\Domain\Common\ValueObject\Distance;
use App\Domain\Common\ValueObject\ElapsedTime;
use App\Domain\Session\Entity\Tracking;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;
use PHPUnit\Framework\TestCase as FrameworkTestCase;
use App\Tests\Fixtures\Domain\Session\Entity\EntityMother;

final class TrackingTest extends FrameworkTestCase
{
/**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        ?int $id = null,
        ?Distance $distance = null,
        ?DateTime $init_date = null,
        ?DateTime $finish_date = null,
        ?ElapsedTime $elapsed_time = null
    ): void {
        $tracking = EntityMother::makeTracking(
            id: $id,
            distance: $distance,
            init_date: $init_date,
            finish_date: $finish_date
        );

        $this->assertEquals($id, $tracking->getId());
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
                1,
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
        ?int $id = null,
        ?Distance $distance = null,
        ?DateTime $init_date = null,
        ?DateTime $finish_date = null
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        EntityMother::makeTracking(
            id: $id,
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
            'id as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Tracking::ID)->getMessage(),
                null,
                CommonValueObjectMother::makeDistance(
                    CommonValueObjectMother::makeDistanceValue(),
                    CommonValueObjectMother::makeDistanceUnit()
                ),
                $init_date,
                $finish_date
            ],
            'distance as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Tracking::DISTANCE)->getMessage(),
                1,
                null,
                $init_date,
                $finish_date
            ],
            'init date as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Tracking::INIT_DATE)->getMessage(),
                1,
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
                1,
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
