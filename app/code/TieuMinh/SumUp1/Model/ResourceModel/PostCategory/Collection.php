<?php

namespace TieuMinh\SumUp1\Model\ResourceModel\PostCategory;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct(
    ) {
        $this->_init('TieuMinh\SumUp1\Model\PostCategory', 'TieuMinh\SumUp1\Model\ResourceModel\PostCategory');
    }
}
