<?php
/**
 * Vaimo Promotion
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Promotion
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Promotion\Controller\Customer;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Success constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Init Page
     *
     * @return Page
     */
    public function execute()
    {
        /**
         * @var Page $resultPage
         */
        $resultPage = $this->resultPageFactory->create();

        return $resultPage;
    }
}