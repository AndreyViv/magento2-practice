<?php
/**
 * Vaimo Brand
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Brand
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Brand\Model;

use Magento\Framework\Api\SearchResults;
use Vaimo\Brand\Api\Data\BrandSearchResultInterface;

class BrandSearchResult extends SearchResults implements BrandSearchResultInterface
{
}