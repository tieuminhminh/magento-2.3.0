<?php

namespace TieuMinh\SumUp1\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Result\PageFactory;
use TieuMinh\SumUp1\Model\CategoryFactory;

class Delete extends Action
{
    /**
     * @var CategoryFactory
     */
    protected $_categoryFactory;
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * Delete constructor.
     * @param Action\Context $context
     * @param PageFactory $pageFactory
     * @param CategoryFactory $categoryFactory
     */
    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        CategoryFactory $categoryFactory
    ) {
        $this->_categoryFactory = $categoryFactory;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        $categoryModel = $this->_categoryFactory->create();
        $entity = $categoryModel->load($this->getRequest()->getParam("id"));
        if (isset($entity)) {
            try {
                $entity->delete();
                $this->messageManager->addSuccessMessage(__('Record have been Delete.'));
                return $this->_redirect($this->getUrl("sumup1/category/listing"));
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage(__('Error!.'));
                return $this->_redirect($this->getUrl("sumup1/category/listing"));
            }
        }
    }
}
