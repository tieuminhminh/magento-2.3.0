<?php
namespace TieuMinh\HelloWorld\Controller\Sitemap;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class CreateSitemap extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

}
