<?php

namespace TieuMinh\SumUp1\Block\Adminhtml\Button\Post;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use TieuMinh\SumUp1\Model\PostFactory;

class GenericButton
{

    /**
     * @var Context
     */
    private $context;
    protected $postFactory;

    public function __construct(
        Context $context,
        PostFactory $postFactory
    ) {
        $this->context = $context;
        $this->postFactory = $postFactory;
    }


    /**
     * {@inheritdoc}
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
    public function getPostId()
    {
        try {
        $id = $this->context->getRequest()->getParam('id');

        } catch (NoSuchEntityException $e) {
        }
        return null;
    }
}
