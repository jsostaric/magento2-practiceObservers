<?php


namespace Inchoo\Sample04\Api\Data;


interface CommentInterface
{
    const COMMENT_ID = 'comment_id';
    const NEWS_ID = 'news_id';
    const CONTENT = 'content';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param $commentId
     * @return CommentInterface
     */
    public function setId($commentId);

    /**
     * @return int
     */
    public function getNewsId();

    /**
     * @param $newsId
     * @return CommentInterface
     */
    public function setNewsId($newsId);

    /**
     * @return string|null
     */
    public function getContent();

    /**
     * @param $content
     * @return CommentInterface
     */
    public function setContent($content);
}
