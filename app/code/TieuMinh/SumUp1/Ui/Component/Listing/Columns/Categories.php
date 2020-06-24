<?php

namespace TieuMinh\SumUp1\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use TieuMinh\SumUp1\Model\CategoryFactory;

class Categories extends Column
{
    private $categoryFactory;

    /**
     * Category constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param CategoryFactory $categoryFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        CategoryFactory $categoryFactory,
        array $components = [],
        array $data = []
    )
    {
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        for ($i = 0; $i < count($dataSource['data']['items']); $i++) {
            $tmp = '';
            foreach ($dataSource['data']['items'][$i]['category_set_id'] as $category) {
                $cateName = $this->categoryFactory->create()->load($category);
                $tmp .= ',' . $cateName['name'];
            }
            $tmp = trim($tmp, ',');
            $dataSource['data']['items'][$i]['category_set_id'] = $tmp;
        }
        return $dataSource;
    }
}
