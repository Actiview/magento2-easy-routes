<?php

declare(strict_types=1);

namespace Actiview\EasyRoutes\Model;

use Actiview\EasyRoutes\Api\Data\EasyRouteInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Although this is an abstract class it cannot be made one as that will not work with `VirtualType`s
 */
class AbstractEasyRoute implements EasyRouteInterface
{
    public function __construct(
        private StoreManagerInterface $storeManager,
        private string $routeId = '',
        private array $storePaths = [],
    ) {}
    
    public function getRouteId(): string
    {
        return $this->routeId;
    }

    public function matches(string $requestPath): bool
    {
        return in_array($requestPath, $this->storePaths);
    }

    public function getAllStorePaths(): array
    {
        return $this->storePaths;
    }

    /**
     * Always return a path for store, fallback to a default.
     */
    public function getPathForStore($store = null): string
    {
        try {
            $store = $this->storeManager->getStore($store);
            $storeCode = $store->getCode();
        } catch (NoSuchEntityException $e) {
            $storeCode = 'default';
        }

        return $this->storePaths[$storeCode]
            ?? $this->storePaths['default']
            ?? $this->storePaths['']
            ?? reset($this->storePaths);
    }
}
