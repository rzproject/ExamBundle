<?php

namespace Rz\ExamBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;


abstract class Question implements QuestionInterface
{
    protected $description;
    protected $content;
    protected $type;
    protected $numAnswers;
    protected $createdAt;
    protected $updatedAt;
    protected $answers;
    protected $examHasQuestions;

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
    public function setNumAnswers ($numAnswers)
    {
        $this->numAnswers = $numAnswers;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumAnswers ()
    {
        return $this->numAnswers;
    }

    /**
     * {@inheritdoc}
     */
    public function setType ($type)
    {
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public function getType ()
    {
        return $this->type;
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
     * {@inheritdoc}
     */
    public function addAnswers(AnswerInterface $answer)
    {
        $this->answers[] = $answer;
        $answer->setQuestion($this);
    }

    /**
     * {@inheritdoc}
     */
    public function setAnswers($answers)
    {
        $this->answers = new ArrayCollection;

        foreach ($answers as $answer) {
            $this->addAnswers($answer);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param mixed $examHasQuestions
     */
    public function setExamHasQuestions ($examHasQuestions)
    {
        $this->examHasQuestions = $examHasQuestions;
    }

    /**
     * @return mixed
     */
    public function getExamHasQuestions ()
    {
        return $this->examHasQuestions;
    }
}
