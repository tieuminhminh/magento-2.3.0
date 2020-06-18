<?php

namespace TieuMinh\SumUp1\Ui\Component\Category;
use TieuMinh\SumUp1\Model\ResourceModel\FormCategory\CollectionFactory;

/**
 * Class DataProvider
 * @package TieuMinh\SumUp1\Ui\Component
 */
class Form extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $loadedData;
    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     */
    private $dataPersistor;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

}
