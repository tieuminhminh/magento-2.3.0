<?php

namespace TieuMinh\SumUp1\Block\Post;

use Magento\Backend\Block\Template;
use Magento\Framework\Pricing\Helper\Data as priceHelper;
use TieuMinh\SumUp1\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class View
 * @package TieuMinh\SumUp1\Block\Post
 */
class View extends Template
{
    protected $postCollectionFactory;
    protected $postFactory;
    protected $priceHepler;
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
     * @return array
     */
    public function action()
    {
        $connection = $this->postCollectionFactory->create()->getConnection();

        $select = $connection->select()->from($this->postCollectionFactory->create()->getTable('tieuminh_post_set'));

        $result = $connection->fetchAll($select);
        return $result;
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
     * @return \TieuMinh\SumUp1\Model\ResourceModel\Post\Collection
     */
    public function getCustomCollection()
    {
        $collection = $this->postCollectionFactory->create();

        $searchblog = ($this->getRequest()->getParam('q')) ? $this->getRequest()->getParam('q') : "";
        if (!empty($searchblog)) {
            $collection->addFieldToFilter('title', ['like' => '%' . $searchblog . '%']);
        }
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 5;

        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
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
