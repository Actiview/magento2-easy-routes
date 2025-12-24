<?php

declare(strict_types=1);

namespace Actiview\EasyRoutes\Api\Data;

interface EasyRouteInterface
{
    public function getRouteId(): string;
    
    public function matches(string $requestPath): bool;

    /**
     * @return array{string,string} 
     */
    public function getAllStorePaths(): array;

    /**
     * @param null|string|bool|int|\Magento\Store\Api\Data\StoreInterface $storeId
     */
    public function getPathForStore($store = null): string;
}
