<?php

declare(strict_types=1);

namespace Actiview\EasyRoutes\Controller;

use Actiview\EasyRoutes\Model\EasyRoutesPool;
use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\UrlInterface;

class Router implements RouterInterface
{
    public function __construct(
        private ActionFactory $actionFactory,
        private EasyRoutesPool $easyRoutesPool,
    ) {}

    /**
     * @inheritDoc
     * @return \Magento\Framework\App\ActionInterface|null
     */
    public function match(RequestInterface $request)
    {
        /** @var HttpRequest $request */
        $requestPath = trim($request->getPathInfo(), '/');
        $easyRoute = $this->easyRoutesPool->resolveEasyRoute($requestPath);

        if (!$easyRoute) {
            return null;
        }

        $request->setAlias(UrlInterface::REWRITE_REQUEST_PATH_ALIAS, $requestPath)
            ->setModuleName('easy_routes')
            ->setControllerName('index')
            ->setActionName('index')
            ->setParam('route_id', $easyRoute->getRouteId())
        ;
        return $this->actionFactory->create(
            Forward::class
        );
    }
}
