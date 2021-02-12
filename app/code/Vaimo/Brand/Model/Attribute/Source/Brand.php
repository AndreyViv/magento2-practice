<?php
/**
 * Vaimo Brand
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Brand
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Brand\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Vaimo\Brand\Api\BrandRepositoryInterfaceFactory;

class Brand extends AbstractSource
{
    /**
     * BrandRepository factory
     * @var \Vaimo\Brand\Api\BrandRepositoryInterfaceFactory
     */
    private $brandRepositoryFactory;
    /**
     * SearchCriteria builder
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * SortOrder builder
     * @var \Magento\Framework\Api\SortOrderBuilder
     */
    private $sortOrderBuilder;

    /**
     * Brand constructor
     *
     * @param \Vaimo\Brand\Api\BrandRepositoryInterfaceFactory $brandRepositoryFactory
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
     */
    public function __construct(
        BrandRepositoryInterfaceFactory $brandRepositoryFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder
    ) {
        $this->brandRepositoryFactory = $brandRepositoryFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [];
            $sortOrder = $this->sortOrderBuilder
                ->setField('brand_id')
                ->setDirection(SortOrder::SORT_ASC)
                ->create();
            $this->searchCriteriaBuilder->addSortOrder($sortOrder);
            $repository = $this->brandRepositoryFactory->create();
            $searchCriteria = $this->searchCriteriaBuilder->create();
            $collection = $repository
                ->getList($searchCriteria)
                ->getItems();
            foreach ($collection as $item) {
                $this->_options[] =
                    [
                        'label' => __($item->getName()),
                        'value' => $item->getId()
                    ];
            }
        }

        return $this->_options;
    }
}
