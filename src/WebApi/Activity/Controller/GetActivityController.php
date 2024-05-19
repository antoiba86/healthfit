<?php

declare(strict_types=1);

namespace App\WebApi\Activity\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Infrastructure\Common\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\WebApi\Common\Controller\AbstractController;
use App\WebApi\Activity\Converter\RequestToGetActivityQueryConverter;
use Symfony\Component\HttpFoundation\Response;

final class GetActivityController extends AbstractController
{
    public function __construct(
        private readonly RequestToGetActivityQueryConverter $request_converter,
        private readonly QueryBus $bus
    ) {
    }

    public function __invoke(Request $request, int $id): Response
    {
        $response = $this->bus->handle($this->request_converter->execute($id));

        return new JsonResponse($response->jsonSerialize());
    }
}
