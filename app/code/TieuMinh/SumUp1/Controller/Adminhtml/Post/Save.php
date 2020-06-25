<?php
namespace TieuMinh\SumUp1\Controller\Adminhtml\Post;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
class Save extends \Magento\Backend\App\Action implements  HttpPostActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $category;
    protected $post_category;
    protected $post;
    protected $form;
    /**
     * @var \TieuMinh\SumUp1\Model\ResourceModel\Tag\CollectionFactory
     */
    private $tagFactory;
    private $_relatedProduct;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \TieuMinh\SumUp1\Model\CategoryFactory $category,
        \TieuMinh\SumUp1\Model\PostCategoryFactory $post_Collection_category,
        \TieuMinh\SumUp1\Model\PostOnlyFactory $post,
        \TieuMinh\SumUp1\Model\FormFactory $form,
        \TieuMinh\SumUp1\Model\ResourceModel\Tag\CollectionFactory $tagFactory,
    \TieuMinh\SumUp1\Model\RelatedProductFactory $_relatedProduct
    ) {
        $this->_pageFactory = $pageFactory;
        $this->category = $category;
        $this->post_category = $post_Collection_category;
        $this->post = $post;
        $this->form = $form;
        $this->tagFactory = $tagFactory;
        $this->_relatedProduct = $_relatedProduct;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->handleData();
        $postModel = $this->post->create();
        $postCollection = $postModel->getCollection();
        $postCollection->addFieldToFilter("title", ["like" => "%{$data["post"]["title"]}%"]);
        $postSize = $postCollection->getSize();

        if ($postSize > 0 || !isset($data["post"]["title"])) {
            $this->messageManager->addErrorMessage(__('Your Post name has been existed !!!'));
            return $this->_redirect($this->getUrl("sumup1/post/listing"));
        } else {
            if (isset($data)) {
                $postModel->addData($data["post"]);
                $postId = $postModel->save()->getId();
                if (!empty($postId)) {
                    if (!empty($data['tag'])) {
                        if ($postModel->getResource()->getConnect()->fetchAll("SELECT COUNT(*) FROM tieuminh_post_tag WHERE post_id = '{$postId}'") > 0) {
                            $postModel->getResource()->deletePostTag($postId);
                        }
                        foreach ($data["tag"] as $item) {
                            $postModel->getResource()->savePostTag($item, $postId);
                        }
                    }
                    if (!empty($data["category"])) {
                        if ($postModel->getResource()->getConnect()->fetchAll("SELECT COUNT(*) FROM tieuminh_post_category WHERE post_id = '{$postId}'") > 0) {
                            $postModel->getResource()->deletePostCategory($postId);
                        }
                        foreach ($data["category"] as $item) {
                            $postModel->getResource()->savePostCategory($item, $postId);
                        }
                    }
                    if (!empty($data["relatedProduct"])) {
                        foreach ($data["relatedProduct"] as $item) {
                            $item["post_id"] = $postId;
                            $item['product_id'] = $item['id'];
                            unset($item['id']);
                            $this->_relatedProduct->create()->addData($item)->save();
                        }
                    }
                    $this->messageManager->addSuccessMessage(__('Record have been Saved.'));
                }
            }
        }
//        $this->_pageFactory->create()->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0', true);
        return $this->_redirect($this->getUrl("sumup1/post/listing"));
    }

    /**
     * @return array
     */
    protected function handleData()
    {
        $result = [];
        $relatedProduct = [];
        $data = $this->getRequest()->getParams();


        $category = $data["category_set_id"];
        $result["tag"] = $data["tag_id"];

        if (!empty($data["links"])) {
            $relatedProduct = $data["links"]["related_product"];
            $result["relatedProduct"]= $relatedProduct;
        }
        unset(
            $data["key"],
            $data["blog_product_listing"],
            $data["form_key"],$data["links"],
            $data["category_set_id"],
            $data["tag"],
            $data["tag_id"]
        );
        $result["category"] = $category;
        $result["post"] = $data;
        if (!isset($data["status"])) {
            $result["post"]["status"] = 0;
        }

        if (!isset($data["thumbnail"][0]["url"])) {
            $result["post"]["thumbnail"] = 'http://vietnam.gg/static/version1592823440/frontend/Magento/luma/vi_VN/Magento_Catalog/images/product/placeholder/image.jpg';
        } else {
            $result["post"]["thumbnail"] = $data["thumbnail"][0]["url"];
        }
        return $result;
    }
}
