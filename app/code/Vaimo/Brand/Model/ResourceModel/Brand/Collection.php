<?php
/**
 * @author AViv
 */

namespace Vaimo\Brand\Model\ResourceModel\Brand;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Vaimo\Brand\Model\Brand',
            'Vaimo\Brand\Model\ResourceModel\Brand'
        );
    }
}
