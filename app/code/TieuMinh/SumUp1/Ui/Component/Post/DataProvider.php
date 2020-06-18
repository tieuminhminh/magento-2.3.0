<?php

namespace TieuMinh\SumUp1\Ui\Component\Post;
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
     * @param \TieuMinh\SumUp1\Model\ResourceModel\Form\CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    private $dataPersistor;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \TieuMinh\SumUp1\Model\ResourceModel\Form\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

}
