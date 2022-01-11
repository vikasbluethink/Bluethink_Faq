<?php 

namespace Bluethink\Faq\Ui\Component\Listing\Column\FaqGroup;

use Magento\Backend\Model\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Icon extends Column {

  /**
   *
   * @var StoreManagerInterface
   */
  protected $storeManagerInterface;

  public function __construct(
    ContextInterface $context,
    UiComponentFactory $uiComponentFactory,
    StoreManagerInterface $storeManagerInterface,
    array $components = [],
    array $data = []
  ) {
      parent::__construct($context, $uiComponentFactory, $components, $data);
      $this->storeManagerInterface = $storeManagerInterface;
  }

  public function prepareDataSource(array $dataSource)
  {
    foreach($dataSource["data"]["items"] as &$item) {
      if (isset($item['icon'])) {
        $url = $this->storeManagerInterface->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) .'bluethink/feature/'. $item['icon'];
        $item['icon_src'] = $url;
        $item['icon_alt'] = $item['faqgroup_id'];
        $item['icon_link'] = $url;
        $item['icon_orig_src'] = $url;
      }
    }

    return $dataSource;
  }
}