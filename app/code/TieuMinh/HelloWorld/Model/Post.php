<?php
namespace TieuMinh\HelloWorld\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'tieuminh_helloworld_post';

    protected $_cacheTag = 'tieuminh_helloworld_post';

    protected $_eventPrefix = 'tieuminh_helloworld_post';

    protected function _construct()
    {
        $this->_init('TieuMinh\HelloWorld\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}