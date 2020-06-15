<?php

namespace TieuMinh\SumUp1\Block\Adminhtml\Button\Post;

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


    /**
     * {@inheritdoc}
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
