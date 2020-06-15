<?php
namespace TieuMinh\SumUp1\Model\Option;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Data\OptionSourceInterface;

/**
 * Options tree for "Categories" field
 */
class Category implements OptionSourceInterface
{
    protected $categoryCollectionFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var array
     */
    protected $categoryTree;

    /**
     * @param \TieuMinh\SumUp1\Model\ResourceModel\CategoryFactory $categoryFactory
     * @param RequestInterface $request
     */
    public function __construct(
        \TieuMinh\SumUp1\Model\ResourceModel\CategoryFactory $categoryFactory,
        RequestInterface $request
    ) {
        $this->categoryCollectionFactory = $categoryFactory;
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return $this->getCategoryTree();
    }

    /**
     * Retrieve categories tree
     *
     * @return array
     */
    protected function getCategoryTree()
    {
        if ($this->categoryTree === null) {
            $collection = $this->categoryCollectionFactory->create();

            $collection->addNameToSelect();

            foreach ($collection as $category) {
                $categoryId = $category->getEntityId();
                if (!isset($categoryById[$categoryId])) {
                    $categoryById[$categoryId] = [
                        'value' => $categoryId
                    ];
                }
                $categoryById[$categoryId]['label'] = $category->getName();
            }
            $this->categoryTree = $categoryById;
        }
        return $this->categoryTree;
    }
}
