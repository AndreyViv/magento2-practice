<?php
/**
 * Vaimo Brand
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Brand
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Brand\Block;

use Magento\Framework\View\Element\Template;

class Test extends Template
{
    /**
     * Returns text.
     *
     * @return string
     */
    public function getText()
    {
        return "My Super Text!";
    }
}