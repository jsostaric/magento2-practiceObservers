<?php

namespace Inchoo\EventsObservers\Controller\News;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class View extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $newsRegistry;
    protected $resultForwardFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Registry $newsRegistry,
        ForwardFactory $resultForwardFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->newsRegistry = $newsRegistry;
        $this->resultForwardFactory = $resultForwardFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if($id === null){
            return $this->resultForwardFactory->create()->forward('noroute');
        }

        $this->newsRegistry->register('inchoo_news_id', $id);
        return $this->resultPageFactory->create();
    }
}
