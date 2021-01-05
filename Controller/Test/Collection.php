<?php

namespace Inchoo\EventsObservers\Controller\Test;

use Magento\Framework\App\Action\Context;

class Collection  extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Inchoo\EventsObservers\Model\ResourceModel\News\Collection
     */
    protected $newsCollectionFactory;

    /**
     * Controller constructor.
     * @param Context $context
     * @param \Inchoo\EventsObservers\Model\ResourceModel\News\CollectionFactory $newsCollectionFactory
     */
    public function __construct(
        Context $context,
        \Inchoo\EventsObservers\Model\ResourceModel\News\CollectionFactory $newsCollectionFactory
    ) {
        parent::__construct($context);

        $this->newsCollectionFactory = $newsCollectionFactory;
    }

    /**
     * Controller action.
     */
    public function execute()
    {

        $newsCollection = $this->newsCollectionFactory->create();

        //$newsCollection->addFieldToFilter('id', ['gt' => 5]]);

        foreach($newsCollection as $news) {
            var_dump(get_class($news));
            var_dump($news->debug());
        }

    }

}
