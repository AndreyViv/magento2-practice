<?php
/**
 * Vaimo Brand
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Brand
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Brand\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Vaimo\Brand\Api\Data\BrandInterface;

interface BrandRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return \Vaimo\Brand\Api\Data\BrandInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Vaimo\Brand\Api\Data\BrandInterface $brand
     *
     * @return \Vaimo\Brand\Api\Data\BrandInterface
     */
    public function save(BrandInterface $brand);

    /**
     * @param \Vaimo\Brand\Api\Data\BrandInterface $brand
     *
     * @return void
     */
    public function delete(BrandInterface $brand);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     *
     * @return \Vaimo\Brand\Api\Data\BrandSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}