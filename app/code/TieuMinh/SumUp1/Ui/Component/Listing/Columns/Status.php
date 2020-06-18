<?php

namespace TieuMinh\SumUp1\Ui\Component\Listing\Columns;

use Magento\Framework\Option\ArrayInterface;

class Status extends \Magento\Ui\Component\Listing\Columns\Column
{

    /**
     * @return array|array[]
     */
    public function toOptionArray()
    {
        return [
            [
                'label' => "Disable",
                'value' => 0,
            ],
            [
                'label' => "Enable",
                'value' => 1,
            ],

        ];
    }
}
