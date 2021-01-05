<?php


namespace Inchoo\EventsObservers\Api\Data;


use Magento\Framework\Api\SearchResultsInterface;

interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Inchoo\EventsObservers\Api\Data\CommentInterface[]
     */
    public function getItems();

    /**
     * @param \Inchoo\EventsObservers\Api\Data\CommentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
