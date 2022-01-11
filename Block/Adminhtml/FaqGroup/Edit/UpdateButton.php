<?php


namespace Bluethink\Faq\Block\Adminhtml\FaqGroup\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class UpdateButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Update FAQ Group'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}