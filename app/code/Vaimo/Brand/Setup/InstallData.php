<?php

namespace Vaimo\Brand\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Install brands
         */
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
                ->insertForce($setup->getTable('brand'), $bind);
        }
    }
}
