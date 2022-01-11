<?php
namespace Bluethink\Faq\Model\FaqGroup;
 
use Bluethink\Faq\Model\ResourceModel\FaqGroup\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;


    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $employeeCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $CollectionFactory,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->collection = $CollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
 
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->_loadedData[$item->getId()] = $item->getData();
            if ($item->getIcon()) {
                $m['icon'][0]['name'] = $item->getIcon();
                $m['icon'][0]['url'] = $this->storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'bluethink/feature/'. $item->getIcon();
                $fullData = $this->_loadedData;
                $this->_loadedData[$item->getId()] = array_merge($fullData[$item->getId()], $m);
            }
        }
        return $this->_loadedData;
    }
    
}