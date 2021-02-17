<?php

namespace Vaimo\Promotion\Setup;

use Magento\Cms\Api\Data\BlockInterfaceFactory;
use Magento\Cms\Api\BlockRepositoryInterfaceFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Block factory
     *
     * @var \Magento\Cms\Api\Data\BlockInterfaceFactory
     */
    protected $blockFactory;
    /**
     * BlockRepository factory
     *
     * @var \Magento\Cms\Api\BlockRepositoryInterfaceFactory
     */
    protected $blockRepositoryFactory;

    /**
     * InstallData constructor.
     *
     * @param \Magento\Cms\Api\Data\BlockInterfaceFactory $blockFactory
     * @param \Magento\Cms\Api\BlockRepositoryInterfaceFactory $blockRepositoryFactory
     */
    public function __construct(
        BlockInterfaceFactory $blockFactory,
        BlockRepositoryInterfaceFactory $blockRepositoryFactory
    ) {
        $this->blockFactory = $blockFactory;
        $this->blockRepositoryFactory = $blockRepositoryFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $orderSuccessTitle = 'INVITE FRIEND, GET REWORDS!';
        $customerAccountTitle = '$100 Store Credit for you, $100 Store Credit for your friend';
        $blockText = 'Tell your friends to enter your coupon checkout and They will receive 30% off they first purchase';
        $customerAccountBlockData = [
            'title' => 'Customer Account Promotion Block',
            'identifier' => 'customer_promotion_block',
            'stores' => ['0'],
            'is_active' => 1,
            'content' => '<h3>' . $customerAccountTitle . '</h3><p>' . $blockText . '</p>'
        ];
        $orderSuccessBlockData = [
            'title' => 'Order Success Promotion Block',
            'identifier' => 'order_promotion_block',
            'stores' => ['0'],
            'is_active' => 1,
            'content' => '<h3>' . $orderSuccessTitle . '</h3><p>' . $customerAccountTitle . '. ' . $blockText . '</p>'
        ];
        $customerAccountBlock = $this->blockFactory->create(['data' => $customerAccountBlockData]);
        $orderSuccessBlock = $this->blockFactory->create(['data' => $orderSuccessBlockData]);
        $blockRepository = $this->blockRepositoryFactory->create();
        $blockRepository->save($customerAccountBlock);
        $blockRepository->save($orderSuccessBlock);
        $setup->endSetup();
    }
}
