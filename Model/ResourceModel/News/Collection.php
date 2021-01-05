<?php

namespace Inchoo\EventsObservers\Model\ResourceModel\News;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize news Collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Inchoo\EventsObservers\Model\News::class,
            \Inchoo\EventsObservers\Model\ResourceModel\News::class
        );
    }
}
