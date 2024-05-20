<?php

declare(strict_types=1);

namespace App\Tests\unit\Application\Activity\Query\GetActivity;

use PHPUnit\Framework\TestCase;
use App\Domain\Activity\Exception\ActivityNotExistException;
use App\Domain\Activity\Repository\ActivityRepositoryInterface;
use App\Application\Activity\Query\GetActivity\GetActivityQuery;
use App\Domain\Activity\Entity\Activity;
use App\Tests\Fixtures\Application\Activity\Query\QueryObjectMother;
use App\Tests\Fixtures\Domain\Activity\Entity\EntityMother;

class GetActivityQueryHandlerTest extends TestCase
{
    /**
     * @dataProvider getSuccessfullyProvider
     */
    public function testGetSuccessfully(GetActivityQuery $query, Activity $activity): void
    {
        $repository = $this->createMock(ActivityRepositoryInterface::class);
        $repository->expects($this->once())
            ->method('getById')
            ->willReturn($activity);
        $handler = QueryObjectMother::makeGetActivityQueryHandler($repository);

        $activity_dto = $handler->__invoke($query);
        $this->assertEquals($activity->getId(), $activity_dto->getId());
        $this->assertEquals($activity->getType()->getValue(), $activity_dto->getActivityType());
        $this->assertEquals($activity->getName()->getValue(), $activity_dto->getName());
        $this->assertEquals($activity->getDescription()->getValue(), $activity_dto->getDescription());
    }

    public static function getSuccessfullyProvider(): array
    {
        $id = rand(1, 100);
        $activity = EntityMother::makeDefaultActivity(
            id: $id
        );
        return [
            [
                QueryObjectMother::makeGetActivityQuery(
                    $id
                ),
                $activity
            ],
        ];
    }

    /**
     * @dataProvider getUnsuccessfullyProvider
     */
    public function testGetUnsuccessfully(string $expected_exception, GetActivityQuery $query): void
    {
        $repository = $this->createMock(ActivityRepositoryInterface::class);
        $repository->expects($this->once())
            ->method('getById')
            ->willReturn(null);
        $handler = QueryObjectMother::makeGetActivityQueryHandler($repository);

        $this->expectException($expected_exception);
        $handler->__invoke($query);
    }

    public static function getUnsuccessfullyProvider(): array
    {
        return [
            [
                ActivityNotExistException::class,
                QueryObjectMother::makeGetActivityQuery(
                    1
                )
            ],
        ];
    }
}
