<?php
namespace Bluethink\Faq\Block\Index;
class Index extends \Magento\Framework\View\Element\Template
{

	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Bluethink\Faq\Model\ResourceModel\FaqGroup\CollectionFactory $groupCollectionFactory,
        \Bluethink\Faq\Model\ResourceModel\Faq\CollectionFactory $faqCollectionFactory,
        \Bluethink\Faq\Model\FaqFactory $faqFactory,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Store\Model\StoreManagerInterface $storeManagerInterface
        )
	{
        $this->groupCollectionFactory = $groupCollectionFactory;
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->faqFactory = $faqFactory;
        $this->fiterProvider = $filterProvider;
        $this->storeManagerInterface = $storeManagerInterface;
		parent::__construct($context);
	}

    public function getGroupName(){
        $groups = $this->groupCollectionFactory->create();
        return $groups;
    }

    public function getFaq($group){
        $faqs = $this->faqCollectionFactory->create();
        $faqs = $faqs->addFieldToFilter('group', ['eq' => $group]);
        return $faqs;
    }

    public function getIconUrl($name){
        $url = $this->storeManagerInterface->getStore()->getBaseUrl(\Magento\Backend\Model\UrlInterface::URL_TYPE_MEDIA) .'bluethink/feature/'. $name;
        return $url;
    }

}