<?php

namespace TieuMinh\SumUp1\Ui\Component\Listing\Columns;

use Magento\Framework\DB\Helper;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface;

class Categories extends \Magento\Ui\Component\Listing\Columns\Column
{

    private $array = [];
    /**
     * Store manager
     *
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\DB\Helper
     */
    private $resourceHelper;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param StoreManagerInterface $storeManager
     * @param array $components
     * @param array $data
     * @param Helper $resourceHelper
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        StoreManagerInterface $storeManager,
        array $components = [],
        array $data = [],
        Helper $resourceHelper = null
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $this->storeManager = $storeManager;
        $this->resourceHelper = $resourceHelper ?: $objectManager->get(Helper::class);
        $this->data = $data;
    }

    /**
     * @inheritdoc
     *
     * @deprecated 101.0.0
     */
    public function prepareDataSource(array $dataSource)
    {
        $resource = $dataSource["data"]["items"];
        $this->categoryTree($resource);
        $dataSource["data"]["items"] = $this->array;

        return $dataSource;
    }
    public function categoryTree($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $key => &$item) {
            if ($item['parent_id'] == $parent_id) {
                $item["name"] = $char . $item["name"];
                $this->array[] = $item;
                unset($categories[$key]);
                $this->categoryTree($categories, $item['category_id'], $char . '-------|  ');
            }
        }
    }
}
