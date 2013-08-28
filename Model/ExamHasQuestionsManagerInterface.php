<?php

namespace Rz\ExamBundle\Model;

interface ExamHasQuestionsManagerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create();

    /**
     * {@inheritdoc}
     */
    public function delete(ExamHasQuestionsInterface $examHasQuestions);

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
    public function save(ExamHasQuestionsInterface $examHasQuestions);
}
