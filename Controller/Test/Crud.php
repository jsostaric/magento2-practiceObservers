<?php

namespace Inchoo\EventsObservers\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class Crud extends Action
{
    /**
     * @var \Inchoo\EventsObservers\Api\NewsRepositoryInterface
     */
    protected $newsRepository;

    /**
     * @var \Inchoo\EventsObservers\Api\Data\NewsInterfaceFactory
     */
    protected $newsModelFactory;

    /**
     * Crud constructor.
     *
     * @param Context $context
     * @param \Inchoo\EventsObservers\Api\NewsRepositoryInterface $newsRepository
     * @param \Inchoo\EventsObservers\Api\Data\NewsInterfaceFactory $newsModelFactory
     */
    public function __construct(
        Context $context,
        \Inchoo\EventsObservers\Api\NewsRepositoryInterface $newsRepository,
        \Inchoo\EventsObservers\Api\Data\NewsInterfaceFactory $newsModelFactory
    ) {
        parent::__construct($context);
        $this->newsRepository = $newsRepository;
        $this->newsModelFactory = $newsModelFactory;
    }

    /**
     * Controller action.
     */
    public function execute()
    {
        /**
         * Load through repository example
         */
        try {
            $news = $this->newsRepository->getById(1);
            var_dump($news->debug());
        } catch (NoSuchEntityException $e) {
            //handle error
        }

        /**
         * Save through repository example
         */

        try {
            $news = $this->newsModelFactory->create();
            $news->setTitle('Dummy news title');

            $this->newsRepository->save($news);
            var_dump($news->debug());
        } catch (CouldNotSaveException $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
    }
}
