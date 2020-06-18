<?php

namespace TieuMinh\SumUp1\Block\Adminhtml\Button\Category;

use Magento\Backend\Block\Widget\Context;

class GenericButton
{

    /**
     * @var Context
     */
    private $context;

    public function __construct(
        Context $context
    ) {
        $this->context = $context;
    }


    public function getCategoryId()
    {
        return $this->context->getRequest()->getParam("id");
    }
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
