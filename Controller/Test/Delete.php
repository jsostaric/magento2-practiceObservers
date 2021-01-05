<?php

namespace Inchoo\EventsObservers\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;

class Delete extends Action
{

    /**
     * @var \Inchoo\EventsObservers\Api\NewsRepositoryInterface
     */
    protected $newsRepository;

    /**
     * Delete constructor.
     *
     * @param Context $context
     * @param \Inchoo\EventsObservers\Api\NewsRepositoryInterface $newsRepository
     */
    public function __construct(
        Context $context,
        \Inchoo\EventsObservers\Api\NewsRepositoryInterface $newsRepository
    ) {
        parent::__construct($context);
        $this->newsRepository = $newsRepository;
    }

    /**
     * Controller action.
     */
    public function execute()
    {
        /**
         * Delete news by id.
         */

        try {
            $this->newsRepository->delete($this->newsRepository->getById($id = $this->getRequest()->getParam('id')));
        } catch (LocalizedException $e) {
            echo $e->getMessage();
        }

    }
}
