<?php

namespace Inchoo\Sample04\Controller\News;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class ListAction
 * @package Inchoo\Sample04\Controller\Index
 *
 * List is reserved keyword in PHP, so we're using Action suffix in controller name !!
 */
class ListAction extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        return $resultPage = $this->resultPageFactory->create();
    }
}
