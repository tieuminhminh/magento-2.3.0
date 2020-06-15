<?php

namespace TieuMinh\SumUp1\Ui\Button\Post;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
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
                    'target' => '#tieuminh_sumup1_post_form',
                    'eventData' => ['action' => 'sumup1/post/save']]
                ],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
