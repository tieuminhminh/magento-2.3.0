<?php
namespace TieuMinh\SumUp1\Controller\Post;

use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\View\Result\PageFactory;
use TieuMinh\SumUp1\Model\ResourceModel\Post\CollectionFactory;

class View extends Action
{
    protected $_pageFactory;

    protected $_postFactory;
    /** @var  Collection */

    protected $productCollection;
    /** @var  \TieuMinh\SumUp1\Block\Post\View */
    protected $collection;
    private $product;
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        CollectionFactory $postCollectionFactory,
        ObjectManagerInterface  $objectManager,
        Collection $productCollection,
        \TieuMinh\SumUp1\Block\Post\View $collection
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postCollectionFactory;
        $this->_objectManager = $objectManager;
        $this->productCollection = $productCollection;
        $this->collection = $collection;

        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Custom Pagination'));
        return $resultPage;
    }
}
