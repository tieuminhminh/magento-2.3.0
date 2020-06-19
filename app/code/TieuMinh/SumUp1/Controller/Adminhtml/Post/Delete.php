<?php

namespace TieuMinh\SumUp1\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Result\PageFactory;
use TieuMinh\SumUp1\Model\PostFactory;
use TieuMinh\SumUp1\Model\ResourceModel\RelatedProduct\CollectionFactory;

class Delete extends Action
{
    protected $_postFactory;
    protected $_pageFactory;
    protected $_relatedProduct;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        PostFactory $postFactory,
        CollectionFactory $relatedProductCollection
    ) {
        $this->_relatedProduct = $relatedProductCollection;
        $this->_postFactory = $postFactory;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $postId = $this->getRequest()->getParam("id");
        $postModel = $this->_postFactory->create();
        $entity = $postModel->load($postId);
        $listProduct = $this->_relatedProduct
            ->create()->addFieldToFilter("post_id", ["eq" => $postId]);
        if (isset($entity)) {
            try {
                $postModel->getResource()->deletePostCategory($postId);
                $postModel->getResource()->deletePostTag($postId);
                $entity->delete();
                foreach ($listProduct as $item) {
                    $item->delete();
                }
                $this->messageManager->addSuccessMessage(__('Record have been Delete.'));
                return $this->_redirect($this->getUrl("sumup1/post/listing"));
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage(__('Error!.'));
                return $this->_redirect($this->getUrl("sumup1/post/listing"));
            }
        }
    }
}
