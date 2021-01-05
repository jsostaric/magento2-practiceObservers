<?php


namespace Inchoo\EventsObservers\Api\Data;


use Magento\Framework\Api\SearchResultsInterface;

interface NewsSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get news list.
     *
     * @return \Inchoo\EventsObservers\Api\Data\NewsInterface[]
     */
    public function getItems();

    /**
     * Set news list.
     *
     * @param \Inchoo\EventsObservers\Api\Data\NewsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
