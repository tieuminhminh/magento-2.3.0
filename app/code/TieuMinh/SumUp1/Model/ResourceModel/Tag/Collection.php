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

    public function countTag($id)
    {
        $select = "SELECT COUNT(*) FROM tieuminh_post_tag WHERE post_id =" . $id;

        $result =  $this->_fetchAll($select);
        var_dump($result);

        return $result;
    }
    public function savePostCateogry($data, $id)
    {
        $sql = "INSERT INTO tieuminh_post_category (post_id,category_set_id) VALUES ($id,$data)";
        $this->getConnection()->query($sql);
    }

    /**
     * @param $data
     * @param $id
     */
    public function savePostTag($data, $id)
    {
        $sql = "INSERT INTO post_tag (post_id,tag_id) VALUES ($id,$data)";
        $this->getConnection()->query($sql);
    }

    /**
     * @param $id
     */
    public function deletePostCategory($id)
    {
        $sql = "DELETE FROM tieuminh_post_category where post_id = $id";
        $this->getConnection()->query($sql);
    }

    /**
     * @param $id
     */
    public function deletePostTag($id)
    {
        $sql = "DELETE FROM tieuminh_post_tag where post_id = $id";
        $this->getConnection()->query($sql);
    }
    public function fetchAllCategory($id)
    {
        $select = "SELECT COUNT(*) FROM tieuminh_post_category WHERE post_id = ".$id;

        $result =  $this->_fetchAll($select);
        return $result;
    }
}
