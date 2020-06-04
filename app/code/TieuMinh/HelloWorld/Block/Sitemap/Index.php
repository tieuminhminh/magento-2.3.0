<?php

namespace TieuMinh\HelloWorld\Block\Sitemap;

use Magento\Backend\Block\Template;

class Index extends Template
{
    public function __construct(Template\Context $context, \Magento\Framework\App\Request\Http $request)
    {
        parent::__construct($context);
    }

    public function listSitemap()
    {
    }

    public function createSitemap()
    {
    }

    public function action()
    {
        return   $this->getUrl("sitemap/sitemap/handle");
    }
}
