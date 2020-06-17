<?php

namespace TieuMinh\SumUp1\Ui\Component\Post;

use Magento\Authorization\Model\ResourceModel\Role\CollectionFactory;

/**
 * Class DataProvider
 * @package TieuMinh\SumUp1\Ui\Component
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $loadedData;
    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \TieuMinh\SumUp1\Model\ResourceModel\Post\CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \TieuMinh\SumUp1\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }
        return $this->loadedData;
    }
}
