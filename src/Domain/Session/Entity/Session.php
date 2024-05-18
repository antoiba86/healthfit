<?php

declare(strict_types=1);

namespace App\Domain\Session\Entity;

use App\Domain\Activity\Entity\Activity;
use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Session\Entity\Tracking;
use App\Domain\User\Entity\User;

final class Session
{
    public const ID = 'id';
    public const USER = 'user';
    public const ACTIVITY = 'activity';
    public const TRACKING = 'tracking';

    private int $id;
    private User $user;
    private Activity $activity;
    private Tracking $tracking;

    public function __construct(
        ?int $id = null,
        ?User $user = null,
        ?Activity $activity = null,
        ?Tracking $tracking = null
    )
    {
        $this->setId($id);
        $this->setUser($user);
        $this->setActivity($activity);
        $this->setTracking($tracking);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if (is_null($id)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::ID);
        }

        $this->id = $id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        if (is_null($user)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::USER);
        }

        $this->user = $user;
    }

    public function getActivity()
    {
        return $this->activity;
    }

    public function setActivity($activity)
    {
        if (is_null($activity)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::ACTIVITY);
        }

        $this->activity = $activity;
    }
 
    public function getTracking()
    {
        return $this->tracking;
    }

    public function setTracking($tracking)
    {
        if (is_null($tracking)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::TRACKING);
        }

        $this->tracking = $tracking;
    }
}
