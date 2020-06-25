<?php

namespace TieuMinh\SumUp1\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use TieuMinh\SumUp1\Model\ResourceModel\PostOnly\CollectionFactory;

class PostStatus extends Action
{
    protected $filter;

    protected $_postCollection;

    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
    {
        $this->filter            = $filter;
        $this->_postCollection = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $postCollection = $this->filter->getCollection($this->_postCollection->create());
        $status = $this->getRequest()->getParam("status");
        $collectionSize = $postCollection->getSize();
        foreach ($postCollection as $item) {
            $item->setData("status", $status);
            $item->save();
        }
        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been update.', $collectionSize));
        return $this->_redirect($this->getUrl("sumup1/post/listing"));
    }
}
