<?php
/**
 * Vaimo Brand
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Brand
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Brand\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Vaimo\Brand\Api\BrandRepositoryInterface;
use Vaimo\Brand\Api\Data\BrandInterface;
use Vaimo\Brand\Api\Data\BrandSearchResultInterfaceFactory;
use Vaimo\Brand\Api\Data\BrandSearchResultInterface;
use Vaimo\Brand\Model\ResourceModel\Brand\Collection;
use Vaimo\Brand\Model\ResourceModel\Brand\CollectionFactory as BrandCollectionFactory;
use Vaimo\Brand\Model\ResourceModel\BrandFactory as BrandResourceFactory;

class BrandRepository implements BrandRepositoryInterface
{
    /**
     * @var BrandFactory
     */
    protected $brandFactory;
    /**
     * @var BrandResourceFactory
     */
    protected $brandResourceFactory;
    /**
     * @var BrandCollectionFactory
     */
    protected $brandCollectionFactory;
    /**
     * @var BrandSearchResultInterfaceFactory
     */
    protected $searchResultFactory;

    /**
     * BrandRepository constructor.
     *
     * @param \Vaimo\Brand\Model\BrandFactory $brandFactory
     * @param \Vaimo\Brand\Model\ResourceModel\BrandFactory $brandResourceFactory
     * @param \Vaimo\Brand\Model\ResourceModel\Brand\CollectionFactory $brandCollectionFactory
     * @param \Vaimo\Brand\Api\Data\BrandSearchResultInterfaceFactory $brandSearchResultInterfaceFactory
     *
     */
    public function __construct(
        BrandFactory $brandFactory,
        BrandResourceFactory $brandResourceFactory,
        BrandCollectionFactory $brandCollectionFactory,
        BrandSearchResultInterfaceFactory $brandSearchResultInterfaceFactory
    ) {
        $this->brandFactory = $brandFactory;
        $this->brandResourceFactory = $brandResourceFactory;
        $this->brandCollectionFactory = $brandCollectionFactory;
        $this->searchResultFactory = $brandSearchResultInterfaceFactory;
    }

    public function getById($id)
    {
        $brand = $this->brandFactory->create();
        $resource = $this->brandResourceFactory->create();
        $resource->load($brand, $id);
        if (!$brand->getId()) {
            throw new NoSuchEntityException(__('Unable to find hamburger with ID "%1"', $id));
        }

        return $brand;
    }

    public function save(BrandInterface $brand)
    {
        $resource = $this->brandResourceFactory->create();
        $resource->save($brand);

        return $brand;
    }

    public function delete(BrandInterface $brand)
    {
        $resource = $this->brandResourceFactory->create();
        $resource->delete($brand);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     *
     * @return BrandSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->brandCollectionFactory->create();
        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     *
     * @return void
     */
    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     *
     * @return void
     */
    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC
                ? $sortOrder->getDirection() : SortOrder::SORT_DESC;
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     *
     * @return void
     */
    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     *
     * @return BrandSearchResultInterface
     */
    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
