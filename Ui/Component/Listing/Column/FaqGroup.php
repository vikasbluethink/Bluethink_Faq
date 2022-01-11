<?php
namespace Bluethink\Faq\Ui\Component\Listing\Column;

use Bluethink\Faq\Model\ResourceModel\FaqGroup\CollectionFactory;
use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;
use \Magento\Framework\Api\SearchCriteriaBuilder;

class FaqGroup extends Column
{
    protected $_orderRepository;
    protected $_searchCriteria;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        CollectionFactory $faqGroupCollection,
        SearchCriteriaBuilder $criteria,
        array $components = [],
        array $data = []
    ) {
        $this->faqGroupCollection = $faqGroupCollection;
        $this->_searchCriteria  = $criteria;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) 
        {
            foreach ($dataSource['data']['items'] as & $item) 
            {

                $groups = explode(',',$item['group']);
                $groupData = array();
                foreach ($groups as $group) 
                {
                    $groupData[] =  $this->faqGroupCollection->create()->getItemById($group)->getData('groupname');
                   
                }
                
                $item['group'] = implode(',',$groupData);
            }                 
            
        }
        return $dataSource;
    }
}
