<?php

namespace TieuMinh\SumUp1\Controller\Adminhtml\Post;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;
use TieuMinh\SumUp1\Controller\Adminhtml\PostRepositoryInterface;
use TieuMinh\SumUp1\Controller\Adminhtml\Post;
use TieuMinh\SumUp1\Model\Option\FileHandle;

class FileUpload extends Post
{
    /**
     * @var FileHandle
     */
    private $FileHandle;

    public function __construct(
        FileHandle $FileHandle,
        PostRepositoryInterface $postRepository,
        Registry $registry,
        Context $context
    ) {
        $this->FileHandle = $FileHandle;

        parent::__construct($postRepository, $registry, $context);
    }

    /**
     * {@inheritdoc}
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $result = $this->FileHandle->save(key($_FILES));

        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
