<?php
/**
 * Vaimo Promotion
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Promotion
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Promotion\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Vaimo\Promotion\Helper\DataHelperInterfaceFactory;

class Promotion extends Template
{
    /**
     * DataHelper
     * @var DataHelperInterfaceFactory
     */
    private $dataHelperFactory;

    /**
     * CustomerAccount constructor.
     *
     * @param DataHelperInterfaceFactory $dataHelperFactory
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        DataHelperInterfaceFactory $dataHelperFactory,
        Context $context,
        array $data = []
    ) {
        $this->dataHelperFactory = $dataHelperFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function isPromotionActive()
    {
        $helper = $this->dataHelperFactory->create();

        return $helper->getPromotionStatus() > 0;
    }
}