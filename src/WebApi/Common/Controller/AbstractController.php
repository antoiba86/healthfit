<?php

declare(strict_types=1);

namespace App\WebApi\Common\Controller;

use App\WebApi\Common\Response\ResourceCreatedResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    protected function makeResourceCreatedResponse(): Response
    {
        return new JsonResponse(data: new ResourceCreatedResponse(), status: Response::HTTP_CREATED);
    }
}
