<?php


namespace Inchoo\Sample04\Model\ResourceModel\Comment;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Inchoo\Sample04\Model\Comment::class,
            \Inchoo\Sample04\Model\ResourceModel\Comment::class
        );
    }
}
