<?php

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