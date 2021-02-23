<?php
/**
 * Vaimo Brand
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Brand
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Brand\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BrandSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Vaimo\Brand\Api\Data\BrandInterface[]
     */
    public function getItems();

    /**
     * @param \Vaimo\Brand\Api\Data\BrandInterface[] $items
     *
     * @return void
     */
    public function setItems(array $items);
}