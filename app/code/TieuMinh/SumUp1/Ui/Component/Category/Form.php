<?php

namespace TieuMinh\SumUp1\Ui\Component\Category;
/**
 * Class DataProvider
 * @package TieuMinh\SumUp1\Ui\Component
 */
class Form extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $form;
    protected $loadedData;
    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \TieuMinh\SumUp1\Model\ResourceModel\FormCategory\CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    private $dataPersistor;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \TieuMinh\SumUp1\Model\ResourceModel\FormCategory\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->form = $collectionFactory;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
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
