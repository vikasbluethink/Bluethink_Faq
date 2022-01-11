<?php

namespace Bluethink\Faq\Controller\Adminhtml\Faqgroup;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Magento\Framework\Validation\ValidationException;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\View\Result\PageFactory;
use Bluethink\Faq\Model\FaqGroupFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Bluethink\Faq\Model\ImageUploader;

class Save extends Action
{
    protected $resultPageFactory;
    protected $faqgroupFactory;

    /**
     *
     * @var UploaderFactory
     */
    protected $uploaderFactory;

    /**
     * @var \Bluethink\Faq\Model\ImageUploader
     */
    protected $imageUploader;

    /** 
     * @var Filesystem\Directory\WriteInterface 
     */
    protected $mediaDirectory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        UploaderFactory $uploaderFactory,
        Filesystem $filesystem,
        FaqGroupFactory $faqgroupFactory,
        ImageUploader $imageUploader
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->faqgroupFactory = $faqgroupFactory;
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getParams();
            // echo "<pre>";
            // print_r($data);die;
           
            if ($data) {

                if (isset($data['icon'][0]['name']) && isset($data['icon'][0]['tmp_name'])) {
                    $data['icon'] = $data['icon'][0]['name'];
                    $this->imageUploader->moveFileFromTmp($data['icon']);
                } elseif (isset($data['icon'][0]['name']) && !isset($data['icon'][0]['tmp_name'])) {
                    $data['icon'] = $data['icon'][0]['name'];
                } else {
                    $data['icon'] = '';
                }

                $groupname = $data['groupname'];
                $icon = $data['icon'];
                $storeview = implode(',',$data['storeview']);
                $customergroup = implode(',',$data['customer_group']);
                $sortorder = $data['sortorder'];
                $status = $data['status'];

                $model = $this->faqgroupFactory->create();
                if(isset($data['faqgroup_id'])){
                    $id = $data['faqgroup_id'];
                    $model->load($id);
                    $model->setData('groupname',$groupname)
                        ->setData('icon',$icon)
                        ->setData('customer_group',$customergroup)
                        ->setData('sortorder',$sortorder)
                        ->setData('storeview',$storeview)
                        ->setData('status',$status);
                    $model->save();
                }else{

                    $model->setData('groupname',$groupname)
                            ->setData('icon',$icon)
                            ->setData('customer_group',$customergroup)
                            ->setData('sortorder',$sortorder)
                            ->setData('storeview',$storeview)
                            ->setData('status',$status);
                    $model->save();
                }
                
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