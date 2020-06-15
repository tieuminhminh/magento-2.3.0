<?php
namespace TieuMinh\HelloWorld\Model\ResourceModel\Post;

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
        $this->_init('TieuMinh\SumUp1\Model\Post', 'TieuMinh\SumUp1\Model\ResourceModel\Post');
    }
}
