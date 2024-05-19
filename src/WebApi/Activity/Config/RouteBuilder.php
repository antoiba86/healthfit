<?php

declare(strict_types=1);

namespace App\WebApi\Activity\Config;

use App\Infrastructure\Common\Route\Symfony\RouteBuilderInterface;
use App\WebApi\Activity\Controller\CreateActivityController;
use App\WebApi\Activity\Controller\GetActivityController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

final class RouteBuilder implements RouteBuilderInterface
{
    public function build(RoutingConfigurator $routes): RoutingConfigurator
    {
        $routes->add('api.activity.get', '/api/activities/{id}')
            ->controller(GetActivityController::class)
            ->methods(['GET']);

        $routes->add('api.activity.post', '/api/activities')
            ->controller(CreateActivityController::class)
            ->methods(['POST']);

        return $routes;
    }
}
