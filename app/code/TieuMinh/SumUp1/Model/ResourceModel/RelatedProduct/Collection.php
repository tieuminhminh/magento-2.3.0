<?php

namespace TieuMinh\SumUp1\Model\ResourceModel\RelatedProduct;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = "related_id";

    protected function _construct()
    {
        $this->_init("\TieuMinh\SumUp1\Model\RelatedProduct", "\TieuMinh\SumUp1\Model\ResourceModel\RelatedProduct");
    }
}
