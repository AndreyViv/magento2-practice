<?php

namespace Vaimo\Promotion\Block;

use Magento\Framework\View\Element\Template;

class CustomerAccount extends Template
{
    /**
     * @return string
     */
    public function getReferBase()
    {
        $userId = 44;

        return 'http://andreyviv.test/promotion/customer/id/' . $userId . '/refer/link/';
    }

    /**
     * @return string
     */
    public function getFacebookLink()
    {
        return 'http://fb.com/api/post/action/path/' . $this->getReferLink();
    }

    /**
     * @return string
     */
    public function getTwitterLink()
    {
        return 'http://twitter.com/api/post/action/path/' . $this->getReferLink();
    }

    /**
     * @return string
     */
    public function getTotalEarned()
    {
        $total = 0;
        $currency = '$';

        return $total . ' ' . $currency;
    }

    /**
     * @return int
     */
    public function getReferralLinkClicksCount()
    {
        return 3;
    }

    /**
     * @return int
     */
    public function getReferralPendingCount()
    {
        return 0;
    }

    /**
     * @return int
     */
    public function getReferralApprovedCount()
    {
        return 0;
    }
}