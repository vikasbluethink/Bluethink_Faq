<?php

namespace Bluethink\Faq\Ui\Component\Listing\Column\Faq;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class Edit extends Column
{
    /** Url path */
    const ROW_EDIT_URL = 'bluethink/faq/edit';
    /** @var UrlInterface */
    protected $_urlBuilder;

    /**
     * @var string
     */
    private $_editUrl;

    /**
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface       $urlBuilder
     * @param array              $components
     * @param array              $data
     * @param string             $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::ROW_EDIT_URL
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source.
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['faq_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->_urlBuilder->getUrl(
                            $this->_editUrl,
                            ['id' => $item['faq_id']]
                        ),
                        'label' => __('Edit'),
                    ];
                }
            }
        }

        return $dataSource;
    }


    // adobe
    // public function prepareDataSource(array $dataSource)
    // {
    //     if (isset($dataSource['data']['items'])) {
    //         foreach ($dataSource['data']['items'] as & $item) {
    //             // here we can also use the data from $item to configure some parameters of an action URL
    //             $item[$this->getData('name')] = [
    //                 'edit' => [
    //                     'href' => 'http://127.0.0.1/mage2.3/admin/bluethink_grid/post/edit',
    //                     'label' => __('Edit')
    //                 ],
                    // 'remove' => [
                    //     'href' => '/remove',
                    //     'label' => __('Remove')
                    // ],
                    // 'duplicate' => [
                    //     'href' => '/duplicate',
                    //     'label' => __('Duplicate')
                    // ],
    //             ];
    //         }
    //     }

    //     return $dataSource;
    // }
}