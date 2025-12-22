<?php

declare(strict_types=1);

namespace Actiview\EasyRoutes\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly PageFactory $pageFactory,
    ) {}

    public function execute(): ResultInterface
    {
        $routeId = $this->request->getParam('route_id');
        $page = $this->pageFactory->create();
        
        $page->addHandle('easy_routes');
        $page->addHandle('easy_routes_'.$routeId);
        $page->getConfig()->addBodyClass('easy_routes_'.$routeId);

        return $page;
    }
}
