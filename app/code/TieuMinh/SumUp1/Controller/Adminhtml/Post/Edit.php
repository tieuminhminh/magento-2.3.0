<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace TieuMinh\SumUp1\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
{
    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfiginterface;
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * GetConfig constructor.
     * @param Action\Context $context
     * @param PageFactory $pageFactory
     * @param ScopeConfigInterface $scopeConfigInterface
     */
    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        ScopeConfigInterface $scopeConfigInterface
    ) {
        $this->_scopeConfiginterface = $scopeConfigInterface;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
