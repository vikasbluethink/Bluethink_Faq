<?php

namespace Bluethink\Faq\Model\Api;

use Bluethink\Faq\Api\FaqInterface;
use Bluethink\Faq\Model\FaqFactory;

class Faq  implements FaqInterface
{
    public function __construct(FaqFactory $faqFactory)
    {
        $this->faqFactory = $faqFactory;
    }

    /** @param string $data 
     * @return string
     */
    public function getPost($data)
    {
        $insertFaq = $this->faqFactory->create();
        try {
            
            if($data){
                $insertFaq->setData('title',$data['title'])
                            ->setData('content',$data['content'])
                            ->setData('group',$data['group'])
                            ->setData('customer_group',$data['customer_group'])
                            ->setData('sortorder',$data['sortorder'])
                            ->setData('storeview',$data['storeview'])
                            ->setData('status',$data['status']);
                $insertFaq->save();
                $response = ['success' => true, 'message' => $data];

            }
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
        }
        return $response;
    }

    /** * @return string */
    public function getData()
    {
        try {
            $data = $this->faqFactory->create()->getCollection()->getData();
            return $data;
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /** * @param int $id * @return string */
    public function getById($id)
    {
        try {
            if ($id) {
                $data = $this->faqFactory->create()->load($id)->getData();
                return ['success' => true, 'message' => $data];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /** * GET for Post api * @param int $id * @return string */
    public function getEdit($data)
    {
        // $edit = file_get_contents("php://input");
        // $data = json_decode($edit, true);
        $insertFaq = $this->faqFactory->create();
        $id = $data['id'];
        if ($id) {
            try {
                $insertData->load($id);
                $insertFaq->setData('title',$data['title'])
                            ->setData('content',$data['content'])
                            ->setData('group',$data['group'])
                            ->setData('customer_group',$data['customer_group'])
                            ->setData('sortorder',$data['sortorder'])
                            ->setData('storeview',$data['storeview'])
                            ->setData('status',$data['status']);
                $insertFaq->save();
                $response = ['success' => true, 'message' => $data];
            } catch (\Exception $e) {
                $response = ['success' => false, 'message' => $e->getMessage()];
            }
        }
        return response;
    }
    
     /** * @param int $id * @return bool true on success */
     public function getDelete($id)
     {
         try {
             if ($id) {
                 $data = $this->faqFactory->create()->load($id);
                 $data->delete();
                 return "success";
             }
         } catch (\Exception $e) {
             $response = ['success' => false, 'message' => $e->getMessage()];
         }
         return "false";
     }
 
}
