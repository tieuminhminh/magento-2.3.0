<?php
namespace TieuMinh\SumUp1\Model;

class FormCategory extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(\TieuMinh\SumUp1\Model\ResourceModel\FormCategory::class);
    }
}
