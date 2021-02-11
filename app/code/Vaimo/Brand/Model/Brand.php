<?php
/**
 * @author AViv
 */

namespace Vaimo\Brand\Model;

use Magento\Framework\Model\AbstractModel;
use Vaimo\Brand\Api\Data\BrandInterface;

class Brand extends AbstractModel implements BrandInterface
{
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const IMAGE_LINK = 'image_link';

    protected function _construct()
    {
        $this->_init('Vaimo\Brand\Model\ResourceModel\Brand');
    }

    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    public function getDescription()
    {
        return $this->_getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
        $this->setData(self::DESCRIPTION, $description);
    }

    public function getImageLink()
    {
        return $this->_getData(self::IMAGE_LINK);
    }

    public function setImageLink($link)
    {
        $this->setData(self::IMAGE_LINK, $link);
    }
}
