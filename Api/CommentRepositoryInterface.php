<?php


namespace Inchoo\EventsObservers\Api;


interface CommentRepositoryInterface
{
    /**
     * @param int $commentId
     * @return mixed
     */
    public function getById(int $commentId);

    /**
     * @param Data\CommentInterface $comment
     * @return \Inchoo\EventsObservers\Api\Data\CommentInterface
     */
    public function save(Data\CommentInterface $comment);

    /**
     * @param Data\CommentInterface $comment
     * @return bool true on success
     */
    public function delete(Data\CommentInterface $comment);
}
