<?php

namespace TieuMinh\SumUp1\Model\ResourceModel\FormCategory;

use TieuMinh\SumUp1\Model\FormCategory;

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
        $this->_init(FormCategory::class, \TieuMinh\SumUp1\Model\ResourceModel\FormCategory::class);
    }


}
