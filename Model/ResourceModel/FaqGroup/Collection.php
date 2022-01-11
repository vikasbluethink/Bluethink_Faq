<?php

namespace Bluethink\Faq\Model\ResourceModel\FaqGroup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Bluethink\Faq\Model\FaqGroup as FaqGroupModel;
use Bluethink\Faq\Model\ResourceModel\FaqGroup as FaqGroupResourceModel;

class Collection extends AbstractCollection
{
    public $_idFieldName = 'faqgroup_id';
   
    /**
     * Define resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            FaqGroupModel::class,
            FaqGroupResourceModel::class
        );
    }

    /**
     * Retrieve option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return parent::_toOptionArray('faqgroup_id', 'groupname');
    }
}