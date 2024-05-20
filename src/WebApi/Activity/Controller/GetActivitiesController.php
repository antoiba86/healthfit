<?php

declare(strict_types=1);

namespace App\WebApi\Activity\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Infrastructure\Common\Bus\Query\QueryBus;
use App\WebApi\Activity\Converter\RequestToGetActivitiesQueryConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\WebApi\Common\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class GetActivitiesController extends AbstractController
{
    public function __construct(
        private readonly RequestToGetActivitiesQueryConverter $request_converter,
        private readonly QueryBus $bus
    ) {
    }

    public function __invoke(Request $request): Response
    {
        $response = $this->bus->handle($this->request_converter->execute($request));

        return new JsonResponse($response);
    }
}
