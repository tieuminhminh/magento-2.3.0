<?php
namespace TieuMinh\SumUp1\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PostOnly extends AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('tieuminh_post_set', 'post_id');
    }
    public function getConnect()
    {
        return $this->getConnection();
    }
    public function deletePostCategory($id)
    {
        $sql = "DELETE FROM tieuminh_post_category where post_id = '{$id}'";
        $this->getConnect()->query($sql);
    }
    /**
     * @param $id
     */
    public function deletePostTag($id)
    {
        $sql = "DELETE FROM tieuminh_post_tag where post_id = '{$id}'";
        $this->getConnect()->query($sql);
    }
    public function savePostTag($data, $id)
    {
        $sql = "INSERT INTO tieuminh_post_tag (post_id,tag_id) VALUES ($id,$data)";
        $this->getConnect()->query($sql);
    }
    public function savePostCategory($data, $id)
    {
        $sql = "INSERT INTO tieuminh_post_category (post_id,category_set_id) VALUES ($id,$data)";
        $this->getConnect()->query($sql);
    }
}
