<?php

namespace Inchoo\Sample04\Model;

use Inchoo\Sample04\Api\Data\NewsInterface;
use Inchoo\Sample04\Api\NewsRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class NewsRepository implements NewsRepositoryInterface
{
    /**
     * @var \Inchoo\Sample04\Api\Data\NewsInterfaceFactory
     */
    protected $newsModelFactory;

    /**
     * @var \Inchoo\Sample04\Model\ResourceModel\News
     */
    protected $newsResource;

    /**
     * @var \Inchoo\Sample04\Model\ResourceModel\News\CollectionFactory
     */
    protected $newsCollectionFactory;

    /**
     * @var \Inchoo\Sample04\Api\Data\NewsSearchResultsInterface
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    public function __construct(
        \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsModelFactory,
        \Inchoo\Sample04\Api\Data\NewsSearchResultsInterfaceFactory $newsSearchResultsFactory,
        \Inchoo\Sample04\Model\ResourceModel\News $newsResource,
        \Inchoo\Sample04\Model\ResourceModel\News\CollectionFactory $newsCollectionFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->newsResource = $newsResource;
        $this->newsModelFactory = $newsModelFactory;
        $this->newsCollectionFactory = $newsCollectionFactory;
        $this->searchResultsFactory = $newsSearchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $newsId
     * @return Data\NewsInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $newsId)
    {
        $news = $this->newsModelFactory->create();
        $this->newsResource->load($news, $newsId);
        if (!$news->getId()) {
            throw new NoSuchEntityException(__('News with id "%1" does not exist!', $newsId));
        }

        return $news;
    }

    /**
     * @param NewsInterface $news
     * @return NewsInterface
     * @throws CouldNotSaveException
     */
    public function save(NewsInterface $news)
    {
        try {
            $this->newsResource->save($news);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $news;
    }

    public function delete(NewsInterface $news)
    {
        try {
            $this->newsResource->delete($news);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Inchoo\Sample04\Model\ResourceModel\News\Collection $collection */
        $collection = $this->newsCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var Data\NewsSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
