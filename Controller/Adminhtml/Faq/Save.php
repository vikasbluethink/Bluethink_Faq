<?php

namespace Bluethink\Faq\Controller\Adminhtml\Faq;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Bluethink\Faq\Model\FaqFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Save extends Action
{
    protected $resultPageFactory;
    protected $faqFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        FaqFactory $faqFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->faqFactory = $faqFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getParam('bluethink_faq');
                        
            if ($data) {

                $title = $data['title'];
                $content = $data['content'];
                $group = implode(',',$data['group']);
                $customergroup = implode(',',$data['customer_group']);
                $sortorder = $data['sortorder'];
                $storeview = implode(',',$data['storeview']);
                $status = $data['status'];

                $model = $this->faqFactory->create();
                if(isset($data['faq_id'])){
                    $id = $data['faq_id'];
                    $model->load($id);
                }
                $model->setData('title',$title)
                        ->setData('content',$content)
                        ->setData('group',$group)
                        ->setData('customer_group',$customergroup)
                        ->setData('sortorder',$sortorder)
                        ->setData('storeview',$storeview)
                        ->setData('status',$status);
                $model->save();
                
                    $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
                    
                
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;

    }
}