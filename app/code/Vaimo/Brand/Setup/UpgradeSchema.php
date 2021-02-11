<?php

namespace Vaimo\Brand\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Upgrade the Brand module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '2.0.0', '<')) {
            if (!$setup->tableExists('brand')) {
                $table = $setup->getConnection()
                    ->newTable($setup->getTable('brand'))
                    ->addColumn(
                        'brand_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'unsigned' => true,
                            'nullable' => false,
                            'primary' => true
                        ],
                        'Brand ID'
                    )
                    ->addColumn(
                        'name',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [
                            'nullable' => false,
                            'default' => 'UNKNOWN'
                        ],
                        'Name'
                    )
                    ->addColumn(
                        'description',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [
                            'nullable' => true
                        ],
                        'Name'
                    )->setComment("Brand table");
                $setup->getConnection()->createTable($table);
            }
        }
        if (version_compare($context->getVersion(), '2.0.1', '<')) {
            $setup->getConnection()
                ->renameTable(
                    $setup->getTable('brand'),
                    $setup->getTable('vaimo_brand')
                );
        }
        if (version_compare($context->getVersion(), '2.0.4', '<')) {
            $table = $setup->getConnection()->addColumn(
                'vaimo_brand',
                'image_link',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 300,
                    'nullable' => false,
                    'default' => '',
                    'comment' => 'Image link'
                ]
            );
        }
        $setup->endSetup();
    }
}
