<?php

namespace Rz\ExamBundle\Model;

interface AnswersInterface
{
    /**
     * {@inheritdoc}
     */
    public function setContent ($content);

    /**
     * {@inheritdoc}
     */
    public function getContent ();

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
    public function setIsRight ($isRight);

    /**
     * {@inheritdoc}
     */
    public function getIsRight ();

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt ($updatedAt);

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt ();
}
