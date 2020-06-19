<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TieuMinh\SumUp1\Ui\Component\Listing\Page;

use Magento\Cms\Block\Adminhtml\Page\Grid\Renderer\Action\UrlBuilder;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class PageActions
 */
class PageActions extends Column
{
    /** Url path */
    const POST_URL_PATH_EDIT = 'sumup1/post/creating';
    const POST_URL_PATH_DELETE = 'sumup1/post/delete';

    /**
     * @var \Magento\Cms\Block\Adminhtml\Page\Grid\Renderer\Action\UrlBuilder
     */
    protected $actionUrlBuilder;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var string
     */
    private $editUrl;

    private $_urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @inheritDoc
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->_urlBuilder->getUrl(
                            static::POST_URL_PATH_EDIT,
                            [
                                'id' => $item['post_id']
                            ]
                        ),
                        'label' => __('Edit')
                    ],
                    'delete' => [
                        'href' => $this->_urlBuilder->getUrl(
                            static::POST_URL_PATH_DELETE,
                            [
                                'id' => $item['post_id']
                            ]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete'),
                            'message' => __('Are you sure you wan\'t to delete a record?'),
                        ],
                    ],
                ];
            }
        }
        return $dataSource;
    }
}