<?php

namespace Rz\ExamBundle\Model;

interface QuestionInterface
{
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
    public function setNumAnswers ($numAnswers);

    /**
     * {@inheritdoc}
     */
    public function getNumAnswers ();

    /**
     * {@inheritdoc}
     */
    public function setType ($type);

    /**
     * {@inheritdoc}
     */
    public function getType ();

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt ($updatedAt);

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt ();


}
