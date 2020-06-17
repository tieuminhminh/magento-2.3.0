<?php
namespace TieuMinh\SumUp1\Controller\Adminhtml\Post;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $category;
    protected $post_category;
    protected $post;
    protected $form;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \TieuMinh\SumUp1\Model\CategoryFactory $category,
        \TieuMinh\SumUp1\Model\PostCategoryFactory $post_Collection_category,
        \TieuMinh\SumUp1\Model\PostFactory $post,
        \TieuMinh\SumUp1\Model\FormFactory $form
    ) {
        $this->_pageFactory = $pageFactory;
        $this->category = $category;
        $this->post_category = $post_Collection_category;
        $this->post = $post;
        $this->form = $form;

        return parent::__construct($context);
    }

    public function execute()
    {
        $data =  $this->getRequest()->getParams();
        $category = $this->category->create();

        $form = $this->form->create();

        $form->setData('title', $data['title'])
            ->setData('content', $data['content'])
            ->setData('description', $data['description'])
            ->setData('is_active', $data['is_active'])
            ->save();

    }
}
