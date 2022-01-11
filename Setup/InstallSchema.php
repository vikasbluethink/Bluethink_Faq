<?php

namespace Bluethink\Faq\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $table_bluethink_faqgroup = $setup->getConnection()->newTable($setup->getTable('bluethink_faqgroup'));

        $table_bluethink_faqgroup->addColumn(
            'faqgroup_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary' => true,
                'unsigned' => true,
            ],
            'Entity ID'
        );

        $table_bluethink_faqgroup->addColumn(
            'groupname',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'groupname'
        );

        $table_bluethink_faqgroup->addColumn(
            'icon',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'icon'
        );

        $table_bluethink_faqgroup->addColumn(
            'storeview',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'storeview'
        );

        $table_bluethink_faqgroup->addColumn(
            'customer_group',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'customer_group'
        );

        $table_bluethink_faqgroup->addColumn(
            'sortorder',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
            'sortorder'
        );

        $table_bluethink_faqgroup->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
            null,
            [],
            'status'
        );

        $table_bluethink_faq = $setup->getConnection()->newTable($setup->getTable('bluethink_faq'));

        $table_bluethink_faq->addColumn(
            'faq_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary' => true,
                'unsigned' => true,
            ],
            'Entity ID'
        );

        $table_bluethink_faq->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'title'
        );

        $table_bluethink_faq->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'content'
        );

        $table_bluethink_faq->addColumn(
            'group',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'group'
        );

        $table_bluethink_faq->addColumn(
            'storeview',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'storeview'
        );

        $table_bluethink_faq->addColumn(
            'customer_group',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'customer_group'
        );

        $table_bluethink_faq->addColumn(
            'sortorder',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
            'sortorder'
        );

        $table_bluethink_faq->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
            null,
            [],
            'status'
        );

        $setup->getConnection()->createTable($table_bluethink_faq);
        $setup->getConnection()->createTable($table_bluethink_faqgroup);
        $setup->endSetup();
    }
}