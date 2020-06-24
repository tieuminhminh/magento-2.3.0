<?php

namespace TieuMinh\SumUp1\Ui\Component\Post;
/**
 * Class DataProvider
 * @package TieuMinh\SumUp1\Ui\Component
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $form;
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
    private $dataPersistor;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \TieuMinh\SumUp1\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->form = $collectionFactory;
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
            $thumbnail[0]["url"] = $item->getThumbnail();
            $this->loadedData[$item->getId()] = $item->getData();
            $this->loadedData[$item->getId()]["thumbnail"] = $thumbnail;
        }
        return $this->loadedData;
    }
}
