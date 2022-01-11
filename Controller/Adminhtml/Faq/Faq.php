<?php

namespace Bluethink\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

abstract class Faq extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Bluethink_Faq::Faq';
}