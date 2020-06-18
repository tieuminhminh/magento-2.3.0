<?php
namespace TieuMinh\SumUp1\Model;

class Post extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('TieuMinh\SumUp1\Model\ResourceModel\Post');
    }

    public function getPostCate()
    {
        $id = $this->getId();

    }
}
