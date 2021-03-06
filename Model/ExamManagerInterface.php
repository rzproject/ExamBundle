<?php

namespace Rz\ExamBundle\Model;

interface ExamManagerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create();

    /**
     * {@inheritdoc}
     */
    public function delete(ExamInterface $exam);

    /**
     * {@inheritdoc}
     */
    public function findBy(array $criteria);

    /**
     * {@inheritdoc}
     */
    public function findOneBy(array $criteria);

    /**
     * {@inheritdoc}
     */
    public function getClass();

    /**
     * {@inheritdoc}
     */
    public function save(ExamInterface $exam);
}
