<?php

namespace Bluethink\Faq\Model;

use Magento\Framework\Model\AbstractModel;
use Bluethink\Faq\Model\ResourceModel\FaqGroup as FaqGroupResourceModel;

class FaqGroup extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'bluethink_faqgroup';

	protected $_cacheTag = 'bluethink_faqgroup';

	protected $_eventPrefix = 'bluethink_faqgroup';

    /**
     * @return void
     */
    public function _construct()
    {
        $this->_init(FaqGroupResourceModel::class);
    }

    public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

    
}