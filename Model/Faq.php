<?php
namespace Bluethink\Faq\Model;
class Faq extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'bluethink_faq';

	protected $_cacheTag = 'bluethink_faq';

	protected $_eventPrefix = 'bluethink_faq';

	protected function _construct()
	{
		$this->_init('Bluethink\Faq\Model\ResourceModel\Faq');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

	
}