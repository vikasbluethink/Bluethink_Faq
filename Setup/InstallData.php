<?php

namespace Bluethink\Faq\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Add faq sample data
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $faqGroupData = [
            'groupname' => 'General',
            'sortorder' => '1',
            'storeview' => '1',
            'customer_group' => '0,1,2,3,4',
            'status' => '1'
        ];

        $faqData = [
            'title' => 'This is a test FAQ question',
            'content' => 'This is a test FAQ answer',
            'group' => '1',
            'storeview' => '1',
            'customer_group' => '0,1,2,3,4',
            'sortorder' => '0',
            'status' => '1'
        ];

        $faqGroupTable = $setup->getTable('bluethink_faqgroup');
        $faqTable = $setup->getTable('bluethink_faq');

        $setup->getConnection()->insert($faqGroupTable, $faqGroupData);
        $setup->getConnection()->insert($faqTable, $faqData);
    }
}