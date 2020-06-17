<?php

namespace TieuMinh\SumUp1\Controller\Post;

use Magento\Catalog\Model\ResourceModel\Product\Collection;

interface PostInterface
{
    const ID = 'id';

    const NAME             = 'name';
    const STATUS           = 'status';
    const SHORT_DESCRIPTION    = 'short_description';
    const CONTENT          = 'content';
    const URL_KEY          = 'url_key';
    const THUMBNAIL   = 'thumbnail';
    const PUBLISH_DATE_FROM = 'publish_date_from';
    const PUBLISH_DATE_TO = 'publish_date_to';

    const CATEGORY_IDS = 'category_ids';
    const PRODUCT_IDS  = 'product_ids';

    const STATUS_DRAFT          = 0;
    const STATUS_PUBLISHED      = 1;

    /**
     * @return int
     */
    public function getId();


    /**
     * @return string
     */
    public function getStatus();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStatus($value);



    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value);

    /**
     * @return string
     */
    public function getShortDescription();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShortDescription($value);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setContent($value);

    /**
     * @return string
     */
    public function getUrlKey();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUrlKey($value);


    /**
     * @return string
     */
    public function getThumbnail();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setThumbnail($value);

    /**
     * @return string
     */
    public function getPublishDataFrom();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPublishDataTo($value);

    /**
     * @return string
     */
    public function getPublishDataTo();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPublishDataFrom($value);

    /**
     * @return mixed
     */
    public function getCategoryIds();

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setCategoryIds(array $value);


    /**
     * @return mixed
     */
    public function getTagIds();

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setTagIds(array $value);

    /**
     * @return mixed
     */
    public function getProductIds();

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setProductIds(array $value);

    /**
     * @return mixed|Collection
     */
    public function getRelatedProducts();
}

