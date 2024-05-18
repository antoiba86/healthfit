<?php

declare(strict_types=1);

namespace App\Domain\Session\Entity;

use App\Domain\Common\ValueObject\Distance;
use App\Domain\Common\ValueObject\ElapsedTime;
use App\Domain\Common\ValueObject\ElapsedTimeUnit;
use App\Domain\Common\ValueObject\ElapsedTimeValue;
use DateTime;

final class Tracking
{
    private ElapsedTime $elapsed_time;

    public function __construct(
        private int $id,
        private Distance $distance,
        private DateTime $init_date,
        private DateTime $finish_date
    )
    {
        $this->elapsed_time = $this->createdElapsedTtime();
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

    private function calculatedElapsedTimeInSeconds(DateTime $init_date, DateTime $finish_date) {
        return $finish_date->getTimestamp() - $init_date->getTimestamp();
    }
}
