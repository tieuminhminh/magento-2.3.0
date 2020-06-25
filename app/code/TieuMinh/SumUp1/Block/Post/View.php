<?php

namespace TieuMinh\SumUp1\Block\Post;

use Magento\Backend\Block\Template;
use Magento\Framework\Pricing\Helper\Data as priceHelper;
use TieuMinh\SumUp1\Model\ResourceModel\PostOnly\CollectionFactory;

/**
 * Class View
 * @package TieuMinh\SumUp1\Block\Post
 */
class View extends Template
{
    protected $postCollectionFactory;
    protected $postFactory;
    protected $priceHepler;

    protected $collection = null;

    public function __construct(
        Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        CollectionFactory $postCollectionFactory,
        priceHelper $priceHepler,
        \TieuMinh\SumUp1\Model\PostFactory $postFactory
    ) {
        $this->postCollectionFactory = $postCollectionFactory;
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    /**
     * @return $this|View
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('List Blog'));
        //  if ($this->getCustomCollection()) {
        $pager = $this->getLayout()->createBlock(
            'Magento\Theme\Block\Html\Pager',
            'custom.history.pager'
        )->setAvailableLimit([5 => 5, 10 => 10, 15 => 15, 20 => 20])
            ->setShowPerPage(true)->setCollection(
                $this->getCustomCollection()
            );
        $this->setChild('pager', $pager);
        return $this;
    }

    /**
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    /**
     * @return \TieuMinh\SumUp1\Model\ResourceModel\PostOnly\Collection
     */
    public function getCustomCollection()
    {
        if ($this->collection == null) {
            $collection = $this->postCollectionFactory->create();

            $searchblog = $this->getRequest()->getParam('search');
            if ($searchblog) {
                $collection->addFieldToFilter('title', ['like' => '%' . $searchblog . '%']);
            }
            $collection->addFieldToFilter('status', ['eq' => 1]);
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $current_date = date("Y-m-d H:i:s");

            $collection->addFieldToFilter('publish_date_from', ['lteq'=>$current_date]);
            $collection->addFieldToFilter('publish_date_to', ['gteq'=>$current_date]);

            $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
            $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 5;

            $collection->setPageSize($pageSize);
            $collection->setCurPage($page);
            $this->collection = $collection;
        }
        return $this->collection;
    }


    public function getFormattedPrice($price)
    {
        return $this->priceHepler->currency(number_format($price, 2), true, false);
    }

    public function getSearchUrl()
    {
        return $this->_storeManager->getStore()->getUrl('post/post/view');
    }
}
