<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TieuMinh\SumUp1\Model\Option;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\View\Model\PageLayout\Config\BuilderInterface;

/**
 * Class PageLayout
 */
class Category implements OptionSourceInterface
{
    /**
     * @var \Magento\Framework\View\Model\PageLayout\Config\BuilderInterface
     */
    protected $pageLayoutBuilder;
    /**
     * @var \TieuMinh\SumUp1\Model\CategoryFactory $category
     */
    protected $category;
    /**
     * @var array
     */
    protected $options;

    /**
     * Constructor
     *
     * @param BuilderInterface $pageLayoutBuilder
     * @param \TieuMinh\SumUp1\Model\CategoryFactory $category
     */
    public function __construct(BuilderInterface $pageLayoutBuilder, $category)
    {
        $this->pageLayoutBuilder = $pageLayoutBuilder;
        $this->category = $category;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        if ($this->options !== null) {
            return $this->options;
        }

        $options = [
         ];
        $configOptions = [
            '1' => 'cate1',
            '2' => 'cate2',
            '3' => 'cate3',
            ];
        foreach ($configOptions as $key => $value) {
            $options[] = [
                     'label' => $value,
                     'value' => $key,
                 ];
        }
        $this->options = $options;

        return $this->options;
    }
}
