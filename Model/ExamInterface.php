<?php

namespace Rz\ExamBundle\Model;


interface ExamInterface
{
    /**
     * {@inheritdoc}
     */
    public function setCreatedAt ($createdAt);

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt ();

    /**
     * {@inheritdoc}
     */
    public function setDescription ($description);

    /**
     * {@inheritdoc}
     */
    public function getDescription ();

    /**
     * {@inheritdoc}
     */
    public function setIsActive ($isActive);

    /**
     * {@inheritdoc}
     */
    public function getIsActive ();

    /**
     * {@inheritdoc}
     */
    public function setIsOpen ($isOpen);

    /**
     * {@inheritdoc}
     */
    public function getIsOpen ();

    /**
     * {@inheritdoc}
     */
    public function setNumQuestions ($numQuestions);

    /**
     * {@inheritdoc}
     */
    public function getNumQuestions ();

    /**
     * {@inheritdoc}
     */
    public function setPublishEnd ($publishEnd);

    /**
     * {@inheritdoc}
     */
    public function getPublishEnd ();

    /**
     * {@inheritdoc}
     */
    public function setPublishStart ($publishStart);

    /**
     * {@inheritdoc}
     */
    public function getPublishStart ();

    /**
     * {@inheritdoc}
     */
    public function setSlug ($slug);

    /**
     * {@inheritdoc}
     */
    public function getSlug ();

    /**
     * {@inheritdoc}
     */
    public function setTime ($time);

    /**
     * {@inheritdoc}
     */
    public function getTime ();

    /**
     * {@inheritdoc}
     */
    public function setTitle ($title);

    /**
     * {@inheritdoc}
     */
    public function getTitle ();

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt ($updatedAt);

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt ();
}
