<?php

declare(strict_types=1);

namespace Actiview\EasyRoutes\Model;

use Actiview\EasyRoutes\Api\Data\EasyRouteInterface;

class EasyRoutesPool
{
    public function __construct(
        private array $routes = [],
    ) {}

    public function resolveEasyRoute(string $requestPath): ?EasyRouteInterface
    {
        foreach ($this->routes as $easyRoute) {
            if (
                $easyRoute instanceof EasyRouteInterface
                && $easyRoute->matches($requestPath)
            ) {
                return $easyRoute;
            }
        }

        return null;
    }
}
