<?php
/**
 * Vaimo Promotion
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Promotion
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Promotion\Block;

class Checkout extends Promotion
{
    /**
     * @return string
     */
    public function getOrderDetails()
    {
        $result = 'Your order will be delivered withing 1-2 days. ';
        $result .= 'Please make sure that you have entered your complete address and correct details, ';
        $result .= 'as this will reduce any potential delays in your shipment.';

        return $result;
    }
}
