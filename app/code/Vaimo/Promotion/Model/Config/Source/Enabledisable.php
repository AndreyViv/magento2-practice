<?php
/**
 * Vaimo Promotion
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Promotion
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Promotion\Model\Config\Source;

class Enabledisable implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => 1,
                'label' => __('Enabled')
            ],
            [
                'value' => 0,
                'label' => __('Disabled')
            ]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            0 => __('Disabled'),
            1 => __('Enabled')
        ];
    }
}
