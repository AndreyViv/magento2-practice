<?php

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