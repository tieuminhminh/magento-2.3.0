<?php

namespace TieuMinh\SumUp1\Model\ResourceModel\PostOnly;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TieuMinh\SumUp1\Model\PostOnly', 'TieuMinh\SumUp1\Model\ResourceModel\PostOnly');
    }

}
