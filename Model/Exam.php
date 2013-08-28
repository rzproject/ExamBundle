<?php

namespace Rz\ExamBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

abstract class Exam implements ExamInterface
{
    protected $title;
    protected $description;
    protected $time;
    protected $numQuestions;
    protected $slug;
    protected $isActive;
    protected $isOpen;
    protected $publishStart;
    protected $publishEnd;
    protected $createdAt;
    protected $updatedAt;
    protected $examHasQuestions;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->examHasQuestions = new ArrayCollection();
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
    public function setIsActive ($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsActive ()
    {
        return $this->isActive;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsOpen ($isOpen)
    {
        $this->isOpen = $isOpen;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsOpen ()
    {
        return $this->isOpen;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumQuestions ($numQuestions)
    {
        $this->numQuestions = $numQuestions;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumQuestions ()
    {
        return $this->numQuestions;
    }

    /**
     * {@inheritdoc}
     */
    public function setPublishEnd ($publishEnd)
    {
        $this->publishEnd = $publishEnd;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishEnd ()
    {
        return $this->publishEnd;
    }

    /**
     * {@inheritdoc}
     */
    public function setPublishStart ($publishStart)
    {
        $this->publishStart = $publishStart;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishStart ()
    {
        return $this->publishStart;
    }

    /**
     * {@inheritdoc}
     */
    public function setSlug ($slug)
    {
        $this->slug = $slug;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug ()
    {
        return $this->slug;
    }

    /**
     * {@inheritdoc}
     */
    public function setTime ($time)
    {
        $this->time = $time;
    }

    /**
     * {@inheritdoc}
     */
    public function getTime ()
    {
        return $this->time;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle ($title)
    {
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle ()
    {
        return $this->title;
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
    public function setExamHasQuestions($examHasQuestions)
    {
        $this->examHasQuestions = new ArrayCollection();

        foreach ($examHasQuestions as $examHasQuestion) {
            $this->addExamHasQuestions($examHasQuestion);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getExamHasQuestions()
    {
        return $this->examHasQuestions;
    }

    /**
     * {@inheritdoc}
     */
    public function addExamHasQuestions(TutorialHasItemInterface $examHasQuestion)
    {
        $examHasQuestion->setExam($this);
        $this->examHasQuestions[] = $examHasQuestion;
    }
}
