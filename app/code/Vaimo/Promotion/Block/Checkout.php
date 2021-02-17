<?php

namespace Vaimo\Promotion\Block;

use Magento\Framework\View\Element\Template;

class Checkout extends Template
{
    public function getOrderDetails()
    {
        $result = 'Your order will be delivered withing 1-2 days. ';
        $result .= 'Please make sure that you have entered your complete address and correct details, ';
        $result .= 'as this will reduce any potential delays in your shipment.';

        return $result;
    }
}