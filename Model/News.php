<?php

namespace Inchoo\Sample04\Model;

use Inchoo\Sample04\Api\Data\NewsInterface;

class News extends \Magento\Framework\Model\AbstractModel implements NewsInterface
{
    /**
     * Initialize news Model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Inchoo\Sample04\Model\ResourceModel\News::class);
    }

    public function getId()
    {
        return $this->getData(self::NEWS_ID);
    }

    public function setId($id)
    {
        return $this->setData(self::NEWS_ID, $id);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }
}
