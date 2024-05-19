<?php

declare(strict_types=1);

namespace App\WebApi\Activity\Controller;

use App\Infrastructure\Common\Bus\Command\CommandBus;
use App\WebApi\Activity\Converter\RequestToCreateActivityCommandConverter;
use App\WebApi\Common\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateActivityController extends AbstractController
{
    public function __construct(
        private readonly RequestToCreateActivityCommandConverter $request_converter,
        private readonly CommandBus $bus
    ) {
    }

    public function __invoke(Request $request): Response
    {
        $this->bus->dispatch($this->request_converter->execute($request));

        return new Response("Resource Created");
    }
}
