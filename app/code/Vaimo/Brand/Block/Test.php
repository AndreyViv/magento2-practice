<?php

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