<?php

namespace TieuMinh\SumUp1\Block\Adminhtml\Button\Category;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Save extends \TieuMinh\SumUp1\Block\Adminhtml\Button\Category\GenericButton implements ButtonProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save',
                    'target' => '#tieuminh_sumup1_category_form',
                    'eventData' => ['action' => 'sumup1/category/save']]
                ],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
