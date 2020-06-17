<?php

namespace TieuMinh\SumUp1\Controller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Store\Model\StoreManagerInterface;
use TieuMinh\SumUp1\Controller\Post\PostInterface;
use TieuMinh\SumUp1\Model\PostFactory;

abstract class Post extends Action
{
    /**
     * @var PostFactory
     */
    protected $postFactory;

    /**
     * @var Registry
     */
    protected $registry;

    public function __construct(
        StoreManagerInterface $storeManager,
        PostFactory $authorFactory,
        Registry $registry,
        Context $context
    ) {
        $this->storeManager  = $storeManager;
        $this->postFactory   = $authorFactory;
        $this->registry      = $registry;
        $this->context       = $context;
        $this->resultFactory = $context->getResultFactory();

        parent::__construct($context);
    }

    /**
     * @return \TieuMinh\SumUp1\Model\Post|boolean
     */
    protected function initModel()
    {
        $id = $this->getRequest()->getParam(PostInterface::ID);
        if (!$id) {
            return false;
        }

        $post = $this->postFactory->create()->load($id);

        if (!$post->getId()) {
            return false;
        }

        $this->registry->register('current_blog_post', $post);

        return $post;
    }
}
