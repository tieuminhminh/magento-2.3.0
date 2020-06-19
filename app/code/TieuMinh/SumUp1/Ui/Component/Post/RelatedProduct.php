<?php


namespace TieuMinh\SumUp1\Ui\Component\Post;

use Magento\Catalog\Model\ResourceModel\Product\Collection;

class RelatedProduct extends \Magento\Catalog\Ui\DataProvider\Product\ProductDataProvider
{
    public function getCollection()
    {
        /** @var Collection $collection */
        $collection = parent::getCollection();
        return $collection->addAttributeToSelect('status');
    }
}