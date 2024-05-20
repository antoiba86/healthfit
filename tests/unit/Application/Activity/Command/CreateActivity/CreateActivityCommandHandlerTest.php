<?php

declare(strict_types=1);

namespace App\Tests\unit\Application\Activity\Command\CreateActivity;

use PHPUnit\Framework\TestCase;
use App\Domain\Activity\Repository\ActivityRepositoryInterface;
use App\Tests\Fixtures\Application\Activity\Command\CommandObjectMother;
use App\Application\Activity\Command\CreateActivity\CreateActivityCommand;

class CreateActivityCommandHandlerTest extends TestCase
{
    /**
     * @dataProvider createProvider
     */
    public function testCreate(CreateActivityCommand $command): void
    {
        $repository = $this->createMock(ActivityRepositoryInterface::class);
        $repository->expects($this->once())
            ->method('save');
        $handler = CommandObjectMother::makeCreateActivityCommandHandler($repository);

        $handler->__invoke($command);
    }

    public static function createProvider(): array
    {
        return [
            [
                CommandObjectMother::makeCreateActivityCommand(
                    "AEROBIC",
                    'Running',
                    'Running is for cowards'
                )
            ],
        ];
    }
}
