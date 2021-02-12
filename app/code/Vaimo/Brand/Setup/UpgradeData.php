<?php

namespace Vaimo\Brand\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Eav\Setup\EavSetupFactory;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * Eav setup factory
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     *
     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $rowsCount = (int)$setup->getConnection()->showTableStatus("vaimo_brand")["Rows"];
        if ($rowsCount === 0) {
            $data = [
                [
                    'name' => 'Adidas',
                    'description' => 'Adidas brand description.'
                ],
                [
                    'name' => 'Nike',
                    'description' => 'Nike brand description.'
                ]
            ];
            foreach ($data as $bind) {
                $setup->getConnection()
                    ->insertForce($setup->getTable('vaimo_brand'), $bind);
            }
        }
        if (version_compare($context->getVersion(), '2.0.5', '<')) {
            $eavSetup = $this->eavSetupFactory->create();
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'brand',
                [
                    'group' => 'General',
                    'type' => 'varchar',
                    'label' => 'Brand',
                    'input' => 'select',
                    'source' => 'Vaimo\Brand\Model\Attribute\Source\Brand',
                    'frontend' => 'Vaimo\Brand\Model\Attribute\Frontend\Brand',
                    'backend' => 'Vaimo\Brand\Model\Attribute\Backend\Brand',
                    'required' => false,
                    'sort_order' => 50,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'is_used_in_grid' => false,
                    'is_visible_in_grid' => false,
                    'is_filterable_in_grid' => false,
                    'visible' => true,
                    'is_html_allowed_on_front' => true,
                    'visible_on_front' => true
                ]
            );
        }
        $setup->endSetup();
    }
}
