<?php
namespace TieuMinh\SumUp1\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Tag extends AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('tieuminh_tag_set', 'tag_id');
    }

}
