<?php

namespace TieuMinh\SumUp1\Ui\Component\Form;

use Magento\Framework\Option\ArrayInterface;

class Category implements ArrayInterface
{
    protected $_categoryFactory;

    /**
     * Category constructor.
     * @param \TieuMinh\SumUp1\Model\CategoryFactory $categoryFactory
     */
    public function __construct(
        \TieuMinh\SumUp1\Model\CategoryFactory $categoryFactory
    ) {
        $this->_categoryFactory = $categoryFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $result = [];
        $collection = $this->_categoryFactory->create()->getCollection();
        foreach ($collection as $item) {
            $result[] = ["label" => $item->getCategoryName(),"value" => $item->getId()];
        }
        return $result;
    }
}
