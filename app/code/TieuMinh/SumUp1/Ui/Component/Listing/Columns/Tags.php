<?php

namespace TieuMinh\SumUp1\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use TieuMinh\SumUp1\Model\TagFactory;

class Tags extends Column
{
    private $tagFactory;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        TagFactory $tagFactory,
        array $components = [],
        array $data = []
    ) {
        $this->tagFactory = $tagFactory;
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
            foreach ($dataSource['data']['items'][$i]['tag_id'] as $tag) {
                $tagName = $this->tagFactory->create()->load($tag);
                $tmp .= ',' . $tagName['name'];
            }
            $tmp = trim($tmp, ',');
            $dataSource['data']['items'][$i]['tag_id'] = $tmp;
        }
        return $dataSource;
    }
}
