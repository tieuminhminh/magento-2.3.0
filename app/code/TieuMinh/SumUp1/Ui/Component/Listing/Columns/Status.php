<?php

namespace TieuMinh\SumUp1\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use TieuMinh\SumUp1\Model\PostOnlyFactory;

class Status extends Column
{
    private $categoryFactory;

    /**
     * Category constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param PostOnlyFactory $categoryFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        PostOnlyFactory $categoryFactory,
        array $components = [],
        array $data = []
    ) {
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        $data = $dataSource['data']['items'];
        for ($i = 0; $i < count($data); $i++) {
            $status = $data[$i]['status'];
            switch ($status) {
                case 1:
                    $dataSource['data']['items'][$i]['status'] = 'Published';
                    break;
                default:
                    $dataSource['data']['items'][$i]['status'] = 'Draft';
            }
        }
        return $dataSource;
    }

}
