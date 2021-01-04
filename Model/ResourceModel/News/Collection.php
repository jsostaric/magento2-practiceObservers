<?php

namespace Inchoo\Sample04\Model\ResourceModel\News;

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
            \Inchoo\Sample04\Model\News::class,
            \Inchoo\Sample04\Model\ResourceModel\News::class
        );
    }
}
