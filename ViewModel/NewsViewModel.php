<?php

namespace Inchoo\Sample04\ViewModel;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class NewsViewModel implements ArgumentInterface
{
    protected $newsRepository;

    public function __construct(\Inchoo\Sample04\Api\NewsRepositoryInterface $newsRepository) {
        $this->newsRepository = $newsRepository;
    }

    public function getNewsById($id)
    {
        try {
            $news = $this->newsRepository->getById($id);
        } catch (NoSuchEntityException $e) {
            $e->getMessage();
        }

        return $news;
    }
}
