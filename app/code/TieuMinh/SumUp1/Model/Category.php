<?php
namespace TieuMinh\SumUp1\Model;

class Category extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('TieuMinh\SumUp1\Model\ResourceModel\Category');
    }
}