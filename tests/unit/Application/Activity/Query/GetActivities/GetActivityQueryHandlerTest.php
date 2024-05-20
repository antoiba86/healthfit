<?php

declare(strict_types=1);

namespace App\Tests\unit\Application\Activity\Query\GetActivity;

use PHPUnit\Framework\TestCase;
use App\Domain\Activity\Entity\Activity;
use App\Tests\Fixtures\Domain\Activity\Entity\EntityMother;
use App\Domain\Activity\Repository\ActivityRepositoryInterface;
use App\Application\Activity\Query\GetActivities\GetActivitiesQuery;
use App\Domain\Activity\Exception\ActivityTypeIsNotValidException;
use App\Tests\Fixtures\Application\Activity\Query\QueryObjectMother;
use App\Tests\Fixtures\Domain\Activity\ValueObject\ValueObjectMother;

class GetActivitiesQueryHandlerTest extends TestCase
{
    /**
     * @dataProvider getSuccessfullyProvider
     */
    public function testGetSuccessfully(GetActivitiesQuery $query, array $actitivities, int $count, string $method_repository): void
    {
        $repository = $this->createMock(ActivityRepositoryInterface::class);
        $repository->expects($this->once())
            ->method($method_repository)
            ->willReturn($actitivities);
        $handler = QueryObjectMother::makeGetActivitiesQueryHandler($repository);

        $activities_response = $handler->__invoke($query);
        $this->assertEquals($count, count($activities_response));
        foreach ($activities_response as $key => $response) {
            $this->assertEquals($actitivities[$key]->getId(), $response[Activity::ID]);
            $this->assertEquals($actitivities[$key]->getType()->getValue(), $response[Activity::ACTIVITY_TYPE]);
            $this->assertEquals($actitivities[$key]->getName()->getValue(), $response[Activity::NAME]);
            $this->assertEquals($actitivities[$key]->getDescription()->getValue(), $response[Activity::DESCRIPTION]);
        }
        
    }

    public static function getSuccessfullyProvider(): array
    {
        $id = rand(1, 100);
        $id2 = rand(1, 100);
        $activity_type = "FLEXIBILITY";
        $activity = EntityMother::makeDefaultActivity(
            id: $id
        );
        $activity2 = EntityMother::makeDefaultActivity(
            id: $id2,
            activity_type: ValueObjectMother::makeActivityType($activity_type)
        );
        return [
            "Get All" => [
                QueryObjectMother::makeGetActivitiesQuery(),
                [$activity, $activity2],
                2,
                "getAll"
            ],
            "Get empty" => [
                QueryObjectMother::makeGetActivitiesQuery(),
                [],
                0,
                "getAll"
            ],
            "Get Only Flexibility activity types" => [
                QueryObjectMother::makeGetActivitiesQuery($activity_type),
                [$activity2],
                1,
                "getListByActivityType"
            ],
        ];
    }

    /**
     * @dataProvider getUnsuccessfullyProvider
     */
    public function testGetUnsuccessfully(string $expected_exception, GetActivitiesQuery $query): void
    {
        $repository = $this->createMock(ActivityRepositoryInterface::class);
        $handler = QueryObjectMother::makeGetActivitiesQueryHandler($repository);

        $this->expectException($expected_exception);
        $handler->__invoke($query);
    }

    public static function getUnsuccessfullyProvider(): array
    {
        return [
            [
                ActivityTypeIsNotValidException::class,
                QueryObjectMother::makeGetActivitiesQuery("NotvalidActivityType")
            ],
        ];
    }
}
