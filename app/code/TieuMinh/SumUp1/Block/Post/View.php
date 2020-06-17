<?php

namespace TieuMinh\SumUp1\Block\Post;

use Magento\Backend\Block\Template;
use Magento\Framework\Pricing\Helper\Data as priceHelper;
use TieuMinh\SumUp1\Model\ResourceModel\Post\CollectionFactory;

class View extends Template
{
    protected $postCollectionFactory;
    protected $priceHepler;
    public function __construct(
        Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        CollectionFactory $postCollectionFactory,
        priceHelper $priceHepler
    ) {
        $this->postCollectionFactory = $postCollectionFactory;
        parent::__construct($context);
    }

    public function action()
    {
        $connection = $this->postCollectionFactory->create()->getConnection();

        $select = $connection->select()->from($this->postCollectionFactory->create()->getTable('tieuminh_post_set'));

        $result = $connection->fetchAll($select);
        return $result;
    }
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Custom Pagination'));
        //  if ($this->getCustomCollection()) {
        $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'custom.history.pager'
            )->setAvailableLimit([5 => 5, 10 => 10, 15 => 15, 20 => 20])
                ->setShowPerPage(true)->setCollection(
                    $this->getCustomCollection()
                );
        $this->setChild('pager', $pager);
        // $this->getCustomCollection()->load();
        // }    
        return $this;
    }
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
    public function getCustomCollection()
    {
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest(

        )->getParam('limit') : 5;
        $collection = $this->postCollectionFactory->create();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
    }
    public function getFormattedPrice($price)
    {
        return $this->priceHepler->currency(number_format($price, 2), true, false);
    }
}
