<?php
namespace TieuMinh\SumUp1\Block\Post;

use Magento\Backend\Block\Template;

class View extends Template
{
    public function __construct(Template\Context $context, \Magento\Framework\App\Request\Http $request)
    {
        parent::__construct($context);
    }

    public function action()
    {
   $data= [
       'asdf' => 'sdaf',
       'fd' => 'sdaf',
       'sad' => 'sdaf'
       ];
  return $data;
    }
}
