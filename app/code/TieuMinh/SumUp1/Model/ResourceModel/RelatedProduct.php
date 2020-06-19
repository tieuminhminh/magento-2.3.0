<?php

namespace TieuMinh\SumUp1\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class RelatedProduct extends AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init("tieuminh_related_product", "related_id");
    }
}
