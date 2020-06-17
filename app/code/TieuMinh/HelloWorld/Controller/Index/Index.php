<?php
namespace TieuMinh\HelloWorld\Controller\Index;

use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use TieuMinh\HelloWorld\Model\PostFactory;

class Index extends Action
{
    protected $_pageFactory;

    protected $_postFactory;

    private $product;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        ProductFactory $product,
        PostFactory $postCollectionFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postCollectionFactory;
        $this->product = $product;
        return parent::__construct($context);
    }

    public function execute()
    {
        $product = $this->product->create();

        /*        $this->product->create()
                    ->setAttributeSetId(15)
                    ->setTypeId('simple')
                    ->setSku('test')
                    ->save();*/
        $product_getconnection =    $product->getCollection()->setOrder('entity_id', 'DESC');

        $last_item =  $product_getconnection->getFirstItem()->getData();

        /*
                foreach ($product_getconnection as $item) {
                    echo "<pre>";
                    var_dump($item->getData());
                    echo "</pre>";
                }*/

        exit();
        return $this->_pageFactory->create();
    }
}
