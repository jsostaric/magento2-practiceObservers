<?php


namespace Inchoo\Sample04\Api\Data;


use Magento\Framework\Api\SearchResultsInterface;

interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Inchoo\Sample04\Api\Data\CommentInterface[]
     */
    public function getItems();

    /**
     * @param \Inchoo\Sample04\Api\Data\CommentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
