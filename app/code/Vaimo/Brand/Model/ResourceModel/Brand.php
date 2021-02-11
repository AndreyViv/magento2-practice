<?php
/**
 * @author AViv
 */

namespace Vaimo\Brand\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Brand extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('vaimo_brand', 'brand_id');
    }
}
