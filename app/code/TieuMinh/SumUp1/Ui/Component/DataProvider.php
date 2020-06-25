<?php

namespace TieuMinh\SumUp1\Ui\Component;

/**
 * Class DataProvider
 * @package TieuMinh\SumUp1\Ui\Component
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \TieuMinh\SumUp1\Model\ResourceModel\Post\CollectionFactory $collectionFactory
     */
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \TieuMinh\SumUp1\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return mixed
     */
    public function getLoadedData()
    {
        $this->collection->addFieldToFilter($this->getData());
        return $this->loadedData;
    }
}