<?php

namespace Rz\ExamBundle\Model;

abstract class Answers implements AnswersInterface
{
    protected $description;
    protected $content;
    protected $isRight;
    protected $createdAt;
    protected $updatedAt;
    protected $question;

    /**
     * {@inheritdoc}
     */
    public function setDescription ($description)
    {
        $this->description = $description;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription ()
    {
        return $this->description;
    }


    /**
     * {@inheritdoc}
     */
    public function setContent ($content)
    {
        $this->content = $content;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent ()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt ($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt ()
    {
        return $this->createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsRight ($isRight)
    {
        $this->isRight = $isRight;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsRight ()
    {
        return $this->isRight;
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt ($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt ()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion ($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getQuestion ()
    {
        return $this->question;
    }
}
