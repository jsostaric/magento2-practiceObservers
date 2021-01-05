<?php


namespace Inchoo\EventsObservers\ViewModel;


use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class AllNewsViewModel implements ArgumentInterface
{
    protected $newsRepository;
    protected $searchCriteriaBuilder;
    protected $sortOrder;

    public function __construct(
        \Inchoo\EventsObservers\Api\NewsRepositoryInterface $newsRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrder $sortOrder
    )
    {
        $this->newsRepository = $newsRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrder = $sortOrder;
    }

    public function getAllNews()
    {
        $this->sortOrder->setField('news_id')->getDirection('desc');
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $searchCriteria->setSortOrders([$this->sortOrder])->setPageSize(10);

        $newsList = $this->newsRepository->getList($searchCriteria)->getItems();

        return $newsList;
    }
}
