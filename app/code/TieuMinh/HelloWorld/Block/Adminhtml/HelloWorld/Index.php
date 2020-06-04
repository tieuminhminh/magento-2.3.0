<?php

namespace TieuMinh\HelloWorld\Block\Adminhtml\HelloWorld;

use Magento\Backend\Block\Template;

class Index extends Template
{
    private $request;
    public function __construct(Template\Context $context, \Magento\Framework\App\Request\Http $request)
    {
        parent::__construct($context);
        $this->request = $request;
    }

    public function sayHello()
    {
        $name = $this->request->getParam('name');

        echo "hello $name";
    }
}
