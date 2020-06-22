<?php

namespace TieuMinh\SumUp1\Model\ResourceModel\Form;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct(
    ) {
        $this->_init('TieuMinh\SumUp1\Model\Form', 'TieuMinh\SumUp1\Model\ResourceModel\Form');
    }

    protected function _initSelect()
    {
        parent::_initSelect();
        $this->fetchTag();
        $this->fetchCategory();
    }

    public function fetchCategory()
    {
        $postCategory = [];
        foreach ($this as $post) {
            $postCategory[$post->getId()] = [];
        }

        if (!empty($postCategory)) {
            $select = $this->getConnection()->select()->from(
                ['tpc' => "tieuminh_post_category"]
            )->join(
                ['tcs' => $this->getResource()->getTable('tieuminh_category_set')],
                'tpc.category_set_id = tcs.category_id',
                ['name']
            )->where(
                'tpc.post_id IN (?)',
                array_keys($postCategory)
            )->where(
                'tcs.category_id > ?',
                0
            );

            $data = $this->getConnection()->fetchAll($select);
            foreach ($data as $row) {
                $postCategory[$row['post_id']][] = $row['name'];
            }
        }

        foreach ($this as $post) {
            if (isset($postCategory[$post->getId()])) {
                $post->setData('category_set_id', $postCategory[$post->getId()]);
            }
        }
        return $this;
    }

    public function fetchTag()
    {
        $postTags = [];
        foreach ($this as $post) {
            $postTags[$post->getId()] = [];
        }

        if (!empty($postTags)) {
            $select = $this->getConnection()->select()->from(
                ['tpt' => "tieuminh_post_tag"]
            )->join(
                ['tts' => $this->getResource()->getTable('tieuminh_tag_set')],
                'tts.tag_id = tpt.tag_id',
                ['tts.name']
            )->where(
                'tpt.post_id IN (?)',
                array_keys($postTags)
            )->where(
                'tts.tag_id > ?',
                0
            );

            $data = $this->getConnection()->fetchAll($select);
            foreach ($data as $row) {
                $postTags[$row['post_id']][] = $row['name'];
            }
        }
        foreach ($this as $post) {
            if (isset($postTags[$post->getId()])) {
                $post->setData('tag_id', $postTags[$post->getId()]);
            }
        }
        return $this;
    }
}
