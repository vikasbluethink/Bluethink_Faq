<?php
namespace Bluethink\Faq\Model\ResourceModel\Faq;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'faq_id';
	protected $_eventPrefix = 'bluethink_faq_collection';
	protected $_eventObject = 'faq_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Bluethink\Faq\Model\Faq', 'Bluethink\Faq\Model\ResourceModel\Faq');
	}

}