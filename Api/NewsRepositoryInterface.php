<?php


namespace Inchoo\EventsObservers\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface NewsRepositoryInterface
{
    /**
     * Retreive news.
     *
     * @param int $newsId
     * @return \Inchoo\EventsObservers\Api\Data\NewsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById(int $newsId);

    /**
     * Save news.
     *
     * @param \Inchoo\EventsObservers\Api\Data\NewsInterface $news
     * @return \Inchoo\EventsObservers\Api\Data\NewsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\NewsInterface $news);

    /**
     * Delete news
     *
     * @param \Inchoo\EventsObservers\Api\Data\NewsInterface $news
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\NewsInterface $news);

    /**
     * Retrieve news matching the specified search criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Inchoo\EventsObservers\Api\Data\NewsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
