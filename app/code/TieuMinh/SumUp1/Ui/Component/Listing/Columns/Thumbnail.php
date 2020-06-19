<?php

namespace TieuMinh\SumUp1\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Thumbnail extends Column
{
    const NAME = 'thumbnail';
    const ALT_FIELD = 'post thumbnail';
    const URL_PATH_EDIT = "post/post/edit/";
    /**
     * @var \Magento\Framework\UrlInterface
     */
    private $urlBuilder;

    /**
     * Thumbnail constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param \Magento\Catalog\Helper\Image $imageHelper
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->imageHelper = $imageHelper;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData("name");
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$fieldName . '_src'] = $item["thumbnail"];
                $item[$fieldName . '_orig_src'] = $item["thumbnail"];
                $item[$fieldName . '_link'] = $this->urlBuilder->getUrl(
                    self::URL_PATH_EDIT,
                    ['id' => $item["post_id"]]
                );
            }
        }

        return $dataSource;
    }
}
