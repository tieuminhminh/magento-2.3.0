<?php
namespace TieuMinh\SumUp1\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\Component\MassAction\Filter;
use TieuMinh\SumUp1\Model\ResourceModel\PostOnly\CollectionFactory;
use TieuMinh\SumUp1\Model\ResourceModel\RelatedProduct\CollectionFactory as RelatedProduct;

class MassDelete extends Action
{
    protected $filter;

    protected $_postFactory;
    private $_relatedProduct;

    public function __construct(Context $context, Filter $filter, CollectionFactory $_postFactory, RelatedProduct $relatedProduct)
    {
        $this->filter            = $filter;
        $this->_postFactory = $_postFactory;
        $this->_relatedProduct = $relatedProduct;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection     = $this->filter->getCollection($this->_postFactory->create());
        $collectionSize = $collection->getSize();
        $relatedProductCollection = $this->_relatedProduct->create();
        $postResourceModel = $this->_postFactory->create()->getResource();
        try {
            foreach ($collection as $item) {
                $postResourceModel->deletePostCategory($item->getId());
                $postResourceModel->deletePostTag($item->getId());
                $listProduct = $relatedProductCollection
                ->addFieldToFilter("post_id", ["eq" => $item->getId()]);
                foreach ($listProduct as $value) {
                    $value->delete();
                }
                $item->delete();
            }
            $this->messageManager->addSuccess(__('A total of %1 post(s) have been deleted.', $collectionSize));
            /**
             * @var Redirect $resultRedirect
             */
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            return $resultRedirect->setPath('sumup1/post/listing');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage(__("Error Delete Function!"));
            return $this->_redirect($this->getUrl("sumup1/post/listing"));
        }
    }

    public function delete($id)
    {
        $conn = $this->_postFactory->create()->getConnection();
        $sql = "DELETE FROM tieuminh_post_set where post_id = $id";
        $conn->query($sql);
    }
}
