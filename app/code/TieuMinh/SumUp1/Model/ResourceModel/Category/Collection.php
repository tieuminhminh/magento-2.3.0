<?php

namespace TieuMinh\SumUp1\Model\ResourceModel\Category;

use TieuMinh\SumUp1\Model\Category;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'category_id';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct(
    ) {
        $this->_init(Category::class, \TieuMinh\SumUp1\Model\ResourceModel\Category::class);
    }
}
