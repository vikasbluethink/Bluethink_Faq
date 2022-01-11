<?php

namespace Bluethink\Faq\Controller\Adminhtml\Faqgroup;

class Index extends \Magento\Framework\App\Action\Action
{
/** @var \Magento\Framework\View\Result\PageFactory  */
protected $resultPageFactory;
public function __construct(
     \Magento\Framework\App\Action\Context $context,
     \Magento\Framework\View\Result\PageFactory $resultPageFactory
) {
     $this->resultPageFactory = $resultPageFactory;
     parent::__construct($context);
}
/**
* Load the page defined in view/adminhtml/layout/bluethink_faq_form.xml
*
* @return \Magento\Framework\View\Result\Page
*/
public function execute()
{
     return $this->resultPageFactory->create();
}
}