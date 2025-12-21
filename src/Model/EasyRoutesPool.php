<?php

declare(strict_types=1);

namespace Actiview\EasyRoutes\Model;

class EasyRoutesPool
{
    public function __construct(
        private array $routes = [],
    ) {}

    public function getEasyRouteId(string $requestPath): ?string
    {
        if (array_key_exists($requestPath, $this->routes)) {
            return $this->transformId($requestPath);
        }

        foreach ($this->routes as $route => $paths) {
            if (array_key_exists($requestPath, $paths)) {
                return $this->transformId($route);
            }
        }

        return null;
    }

    private function transformId(string $requestPath): string
    {
        return str_replace('/', '-', $requestPath);
    }
}
