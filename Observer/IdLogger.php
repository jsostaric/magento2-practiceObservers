<?php


namespace Inchoo\Sample04\Observer;


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
        $newsId = $observer->getData()[0];
        $this->logger->info('News id is: ' . $newsId);
    }
}
