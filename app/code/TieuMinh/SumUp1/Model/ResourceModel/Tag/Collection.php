<?php

namespace TieuMinh\SumUp1\Model\ResourceModel\Tag;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'tag_id';
//    protected $_eventPrefix = 'mageplaza_helloworld_post_collection';
//    protected $_eventObject = 'post_collection';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TieuMinh\SumUp1\Model\Tag', 'TieuMinh\SumUp1\Model\ResourceModel\Tag');
    }

    public function fetchAllTag($id)
    {
        $select = "SELECT COUNT(*) FROM post_category WHERE post_id =".$id;

        $result =  $this->_fetchAll($select);
        return $result;
    }
}
