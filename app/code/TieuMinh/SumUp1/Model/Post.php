<?php
namespace TieuMinh\SumUp1\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'tieuminh_sumup1_post';

    protected $_cacheTag = 'tieuminh_sumup1_post';

    protected $_eventPrefix = 'tieuminh_sumup1_post';

    protected function _construct()
    {
        $this->_init('TieuMinh\SumUp1\Model\ResourceModel\Post');
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