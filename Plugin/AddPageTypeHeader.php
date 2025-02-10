<?php
namespace Balveshrakkar\PageTypeHeader\Plugin;

use Magento\Framework\App\Response\Http as ResponseHttp;
use Magento\Framework\App\Request\Http as RequestHttp;

class AddPageTypeHeader
{
    public function __construct(
        private RequestHttp $requestHttp
    ) {}

    public function beforeSendResponse(ResponseHttp $subject)
    {
        $pageType = $this->requestHttp->getFullActionName();
        $subject->setHeader('X-Page-Type', $pageType);
    }
}
