<?php

declare(strict_types=1);

namespace App\Domain\Session\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\Distance;
use App\Domain\Common\ValueObject\ElapsedTime;
use App\Domain\Common\ValueObject\ElapsedTimeUnit;
use App\Domain\Common\ValueObject\ElapsedTimeValue;
use DateTime;

final class Tracking
{
    public const ID = 'id';
    public const DISTANCE = 'distance';
    public const INIT_DATE = 'init_date';
    public const FINISH_DATE = 'finish_date';

    private int $id;
    private Distance $distance;
    private DateTime $init_date;
    private DateTime $finish_date;
    private ElapsedTime $elapsed_time;

    public function __construct(
        ?int $id = null,
        ?Distance $distance = null,
        ?DateTime $init_date = null,
        ?DateTime $finish_date = null
    )
    {
        $this->setId($id);
        $this->setDistance($distance);
        $this->setInitDate($init_date);
        $this->setFinishDate($finish_date);
        $this->setElapsedTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        if (is_null($id)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::ID);
        }

        $this->id = $id;
    }

    public function getDistance(): Distance
    {
        return $this->distance;
    }


    public function setDistance($distance): void
    {
        if (is_null($distance)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::DISTANCE);
        }

        $this->distance = $distance;
    }

    public function getInitDate(): DateTime
    {
        return $this->init_date;
    }

    public function setInitDate($init_date): void
    {
        if (is_null($init_date)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::INIT_DATE);
        }

        $this->init_date = $init_date;
    }

    public function getFinishDate(): DateTime
    {
        return $this->finish_date;
    }

    public function setFinishDate($finish_date): void
    {
        if (is_null($finish_date)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::FINISH_DATE);
        }

        $this->finish_date = $finish_date;
    }

    public function getElapsedTime(): ElapsedTime
    {
        return $this->elapsed_time;
    }

    public function setElapsedTime(): void
    {
        $this->elapsed_time = $this->createdElapsedTtime();;
    }

    private function createdElapsedTtime() {
        return new ElapsedTime(
            new ElapsedTimeValue(
                $this->calculatedElapsedTimeInSeconds(
                    $this->init_date, 
                    $this->finish_date
                )
            ),
            new ElapsedTimeUnit(ElapsedTimeUnit::SECOND)
        );
    }

    public function calculatedElapsedTimeInSeconds(DateTime $init_date, DateTime $finish_date) {
        return $finish_date->getTimestamp() - $init_date->getTimestamp();
    }
}
