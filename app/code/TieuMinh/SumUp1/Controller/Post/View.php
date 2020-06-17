<?php
namespace TieuMinh\SumUp1\Controller\Post;

use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Registry;
use Magento\Store\Model\StoreManagerInterface;
use TieuMinh\SumUp1\Controller\Post;
use TieuMinh\SumUp1\Model\PostFactory;

class View extends Post
{
    public function execute()
    {
        $post = $this->initModel();

        if (!$post) {
            throw new NotFoundException(__('Page not found'));
            die;
        }

        /* @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $this->_eventManager->dispatch(
            'blog_page_render',
            ['post' => $post, 'controller_action' => $this]
        );
        return $resultPage;
    }
}
