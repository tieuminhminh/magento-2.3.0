<?php
namespace TieuMinh\SumUp1\Controller\Adminhtml\Category;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $category;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \TieuMinh\SumUp1\Model\CategoryFactory $category

    ) {
        parent::__construct($context);
        $this->category = $category;
    }

    public function execute()
    {
        $data =  $this->getRequest()->getParams();
        $id = $this->getRequest()->getParam('id');
    var_dump($data);
    var_dump($id);
    die;
        $category = $this->category->create();
        $category->setData('name', $data['name'])
            ->setData('parent_id', $data['parent_id'])
            ->save();
        $this->messageManager->addSuccessMessage("Create Category Successfully");
        return $this->_redirect($this->getUrl("sumup1/category/listing"));
    }

}
