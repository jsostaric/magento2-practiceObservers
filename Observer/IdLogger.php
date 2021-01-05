<?php


namespace Inchoo\EventsObservers\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class IdLogger implements ObserverInterface
{
    protected $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $news = $observer->getNews();
        $newsId = $news->getId();
        $this->logger->info('News id is: ' . $newsId);
    }
}
