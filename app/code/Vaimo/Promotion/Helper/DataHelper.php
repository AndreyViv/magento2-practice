<?php
/**
 * Vaimo Promotion
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Promotion
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Promotion\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class DataHelper extends AbstractHelper implements DataHelperInterface
{
    const PROMOTION_STATUS_PATH = 'promotion_config/main_config/status';

    /**
     * @return int|null
     */
    public function getPromotionStatus()
    {
        return $this->scopeConfig->getValue(self::PROMOTION_STATUS_PATH);
    }
}
