<?php

namespace TieuMinh\SumUp1\Block\Post;

use Magento\Backend\Block\Template;
use Magento\Framework\Pricing\Helper\Data as priceHelper;
use TieuMinh\SumUp1\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class View
 * @package TieuMinh\SumUp1\Block\Post
 */
class Detail extends Template
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
     * @return \TieuMinh\SumUp1\Model\ResourceModel\Post\Collection
     */
    public function getTag()
    {
        $id = $this->getRequest()->getParam('id');
        $collection = $this->postCollectionFactory->create();
        $result =   $collection->cateName($id);

        return $result;
    }

    public function getcate()
    {
        $id = $this->getRequest()->getParam('id');
        $collection = $this->postCollectionFactory->create();
        $result = $collection->cateName($id);

        return $result;
    }

    public function getPost()
    {
        $id = $this->getRequest()->getParam('id');
        $collection = $this->postCollectionFactory->create();
        $select =  "SELECT * FROM tieuminh_post_set WHERE post_id = $id";
        $result = $collection->getConnection()->fetchAll($select);
        return $result;
    }
}
