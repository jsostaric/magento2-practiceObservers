<?php


namespace Inchoo\EventsObservers\Model\ResourceModel\Comment;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Inchoo\EventsObservers\Model\Comment::class,
            \Inchoo\EventsObservers\Model\ResourceModel\Comment::class
        );
    }
}
