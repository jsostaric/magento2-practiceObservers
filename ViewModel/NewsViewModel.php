<?php

namespace Inchoo\EventsObservers\ViewModel;

use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class NewsViewModel implements ArgumentInterface
{
    protected $newsRepository;
    protected $eventManager;

    public function __construct(
        \Inchoo\EventsObservers\Api\NewsRepositoryInterface $newsRepository,
        ManagerInterface $eventManager
    ) {
        $this->newsRepository = $newsRepository;
        $this->eventManager = $eventManager;
    }

    public function getNewsById($id)
    {
        try {
            $news = $this->newsRepository->getById($id);
            $this->eventManager->dispatch('inchoo_news_id_log', ['news' => $news]);
        } catch (NoSuchEntityException $e) {
            $e->getMessage();
        }

        return $news;
    }
}
