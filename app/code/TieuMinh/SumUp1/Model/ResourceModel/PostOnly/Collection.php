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

    public function cateName($id)
    {
        $select = $this->getConnection()->select()->from(
            ['tpc' => "tieuminh_post_category"]
        )->join(
            ['tcs' => $this->getResource()->getTable('tieuminh_category_set')],
            'tpc.category_set_id = tcs.category_id',
            ['name']
        )->where(
            'tpc.post_id IN (?)',
            $id
        );

        $data = $this->getConnection()->fetchAll($select);

        return $data;
    }

    public function tagName($id)
    {
        $select = $this->getConnection()->select()->from(
            ['tpt' => "tieuminh_post_tag"]
        )->join(
            ['tts' => $this->getResource()->getTable('tieuminh_tag_set')],
            'tts.tag_id = tpt.tag_id',
            ['tts.name']
        )->where(
            'tpt.post_id IN (?)',
            $id
        );

        $data = $this->getConnection()->fetchAll($select);
        return $data;
    }
}
