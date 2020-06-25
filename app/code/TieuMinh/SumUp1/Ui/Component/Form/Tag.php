<?php

namespace TieuMinh\SumUp1\Ui\Component\Form;

use Magento\Framework\Option\ArrayInterface;

class Tag implements ArrayInterface
{
    protected $_tagFactory;

    public function __construct(
        \TieuMinh\SumUp1\Model\TagFactory $tagFactory
    ) {
        $this->_tagFactory = $tagFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $result = [];
        $collection = $this->_tagFactory->create()->getCollection();
        foreach ($collection as $item) {
            $result[] = ["label" => $item->getName(),"value" => $item->getId()];
        }
        return $result;
    }
}
