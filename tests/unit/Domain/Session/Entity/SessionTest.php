<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Session\Entity;

use App\Domain\User\Entity\User;
use App\Domain\Common\ValueObject\Tracking;
use App\Domain\Activity\Entity\Activity;
use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Session\Entity\Session;
use App\Tests\Fixtures\Domain\Activity\Entity\EntityMother as ActivityEntityMother;
use App\Tests\Fixtures\Domain\Session\Entity\EntityMother;
use App\Tests\Fixtures\Domain\Session\ValueObject\ValueObjectMother;
use App\Tests\Fixtures\Domain\User\Entity\EntityMother as UserEntityMother;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

class SessionTest extends FrameworkTestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        ?int $id = null,
        ?User $user = null,
        ?Activity $activity = null,
        ?Tracking $tracking = null
    ): void {
        $session = EntityMother::makeSession(
            id: $id,
            user: $user,
            activity: $activity,
            tracking: $tracking
        );

        $this->assertEquals($id, $session->getId());
        $this->assertEquals($user, $session->getUser());
        $this->assertEquals($activity, $session->getActivity());
        $this->assertEquals($tracking, $session->getTracking());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            [
                1,
                UserEntityMother::makeDefaultUser(),
                ActivityEntityMother::makeDefaultActivity(),
                ValueObjectMother::makeDefaultTracking()
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
        ?User $user = null,
        ?Activity $activity = null,
        ?Tracking $tracking = null
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        EntityMother::makeSession(
            id: $id,
            user: $user,
            activity: $activity,
            tracking: $tracking
        );
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'id as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Session::ID)->getMessage(),
                null,
                UserEntityMother::makeDefaultUser(),
                ActivityEntityMother::makeDefaultActivity(),
                ValueObjectMother::makeDefaultTracking()
            ],
            'user as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Session::USER)->getMessage(),
                1,
                null,
                ActivityEntityMother::makeDefaultActivity(),
                ValueObjectMother::makeDefaultTracking()
            ],
            'activity as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Session::ACTIVITY)->getMessage(),
                1,
                UserEntityMother::makeDefaultUser(),
                null,
                ValueObjectMother::makeDefaultTracking()
            ],
            'tracking as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Session::TRACKING)->getMessage(),
                1,
                UserEntityMother::makeDefaultUser(),
                ActivityEntityMother::makeDefaultActivity(),
                null
            ]
        ];
    }
}
