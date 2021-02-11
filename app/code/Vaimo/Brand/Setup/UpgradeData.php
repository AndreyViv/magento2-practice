<?php

namespace Vaimo\Brand\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
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
        $setup->endSetup();
    }
}
