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
        $id = $this->request->getParam('id');
        $page = $this->pageFactory->create();

        $page->addPageLayoutHandles([
            'id' => $id,
        ], 'easy_routes');

        $page->getConfig()->addBodyClass('easy_routes_'.$id);

        return $page;
    }
}
