<?php

namespace Bluethink\Faq\Controller\Adminhtml\Faq;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Bluethink\Faq\Model\FaqGroupFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Delete extends Action
{
    protected $resultPageFactory;
    protected $faqgroupFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        FaqGroupFactory $faqgroupFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->faqgroupFactory = $faqgroupFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getParams();

            if ($data) {
                $model = $this->faqgroupFactory->create();
                $model->load($data['id']);
                $model->delete();
                
                    $this->messageManager->addSuccessMessage(__("Data Deleted Successfully."));
                    
                
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t delete the data, Please try again."));
        }
        
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;

    }
}