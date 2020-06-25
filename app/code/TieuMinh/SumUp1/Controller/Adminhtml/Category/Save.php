<?php
namespace TieuMinh\SumUp1\Controller\Adminhtml\Category;

use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;

class Save extends \Magento\Backend\App\Action implements  HttpPostActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $category;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \TieuMinh\SumUp1\Model\CategoryFactory $category
    ) {
        $this->_pageFactory = $pageFactory;
        $this->category = $category;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data =  $this->getRequest()->getParams();
        $id = $this->getRequest()->getParam('id');

        $category = $this->category->create();
        $id = $category->setData('name', $data['name'])
            ->setData('parent_id', $data['parent_id'])
            ->save()->getId();
        $this->messageManager->addSuccessMessage("Create Category Successfully");

        return $this->_redirect($this->getUrl("sumup1/category/listing"));
    }

}
