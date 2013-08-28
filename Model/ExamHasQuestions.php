<?php

namespace Rz\ExamBundle\Model;


abstract class ExamHasQuestions implements ExamHasQuestionsInterface
{
    protected $exam;
    protected $question;
    protected $position;
    protected $enabled;
    protected $createdAt;
    protected $updatedAt;

    public function __construct()
    {
        $this->position = 0;
        $this->enabled  = false;
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
    public function setEnabled ($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function getEnabled ()
    {
        return $this->enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function setPosition ($position)
    {
        $this->position = $position;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosition ()
    {
        return $this->position;
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
     * @param mixed $exam
     */
    public function setExam ($exam)
    {
        $this->exam = $exam;
    }

    /**
     * @return mixed
     */
    public function getExam ()
    {
        return $this->exam;
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
