<?php
/**
 * Vaimo Brand
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Brand
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Brand\Block;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Vaimo\Brand\Api\BrandRepositoryInterface;

class Brand extends Template
{
    /**
     * Request
     * @var RequestInterface
     */
    private $request;
    /**
     * Brand repository
     * @var BrandRepositoryInterface
     */
    private $brandRepository;
    /**
     * SearchCriteria builder
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * SortOrder builder
     * @var SortOrderBuilder
     */
    private $sortOrderBuilder;

    /**
     * Brand constructor
     *
     * @param RequestInterface $request
     * @param BrandRepositoryInterface $brandRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SortOrderBuilder $sortOrderBuilder
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        RequestInterface $request,
        BrandRepositoryInterface $brandRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        Context $context,
        array $data = []
    ) {
        $this->request = $request;
        $this->brandRepository = $brandRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        parent::__construct($context, $data);
    }

    /**
     * @return \Vaimo\Brand\Api\Data\BrandInterface[]
     */
    public function getBrands()
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField('brand_id')
            ->setDirection(SortOrder::SORT_ASC)
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);
        $searchCriteria = $this->searchCriteriaBuilder->create();

        return $this->brandRepository
            ->getList($searchCriteria)
            ->getItems();
    }

    /**
     * @return \Vaimo\Brand\Api\Data\BrandInterface|null
     */
    public function getBrand()
    {
        $id = (int)$this->request->getParam('id');
        try {
            $result = $this->brandRepository->getById($id);
        } catch (NoSuchEntityException $exception) {
            $result = null;
        }

        return $result;
    }
}
