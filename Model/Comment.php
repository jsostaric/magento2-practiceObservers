<?php


namespace Inchoo\Sample04\Model;


use Inchoo\Sample04\Api\Data\CommentInterface;
use Magento\Framework\Model\AbstractModel;

class Comment extends AbstractModel implements CommentInterface
{
    public function __construct()
    {
        $this->_init(\Inchoo\Sample04\Model\ResourceModel\Comment::class);
    }

    public function getId()
    {
        return $this->getData(self::COMMENT_ID);
    }

    public function setId($commentId)
    {
        return $this->setData(self::COMMENT_ID, $commentId);
    }

    public function getNewsId()
    {
        return $this->getData(self::NEWS_ID);
    }

    public function setNewsId($newsId)
    {
        return $this->setData(self::NEWS_ID, $newsId);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }
}
