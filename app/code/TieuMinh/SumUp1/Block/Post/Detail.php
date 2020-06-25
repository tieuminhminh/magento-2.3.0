<?php

namespace TieuMinh\SumUp1\Block\Post;

use Magento\Backend\Block\Template;
use Magento\Framework\Pricing\Helper\Data as priceHelper;
use TieuMinh\SumUp1\Model\ResourceModel\PostOnly\CollectionFactory;
use TieuMinh\SumUp1\Model\ResourceModel\RelatedProduct\CollectionFactory as RelatedFactory;

/**
 * Class View
 * @package TieuMinh\SumUp1\Block\Post
 */
class Detail extends Template
{
    protected $postCollectionFactory;
    protected $postFactory;
    protected $priceHepler;
    protected $relatedProductFactory;

    public function __construct(
        Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        CollectionFactory $postCollectionFactory,
        priceHelper $priceHepler,
        \TieuMinh\SumUp1\Model\PostFactory $postFactory,
         RelatedFactory $relatedProductFactory
    ) {
        $this->postCollectionFactory = $postCollectionFactory;
        $this->postFactory = $postFactory;
        $this->relatedProductFactory = $relatedProductFactory;
        parent::__construct($context);
    }

    /**
     * @return array
     */
    public function getTag()
    {
        $id = $this->getRequest()->getParam('id');
        $collection = $this->postCollectionFactory->create();
        $result =   $collection->tagName($id);

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
    public function fetchRelatedProduct()
    {
        $id = $this->getRequest()->getParam('id');
        $factory = $this->relatedProductFactory->create();
        foreach ($factory as $item) {
            $data = $item->getData();
            if ($data['post_id'] != $id ) {
                $factory->removeItemByKey($data['related_id']);
            }
        }
        return $factory;
    }
}
