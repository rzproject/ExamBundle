<?php

namespace Rz\ExamBundle\Entity;

use Rz\ExamBundle\Model\ExamHasQuestionsManager as ModelExamHasQuestionsManager;
use Rz\ExamBundle\Model\ExamHasQuestionsInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\Query;

class ExamHasQuestionsManager extends ModelExamHasQuestionsManager
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     * @param string                      $class
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em    = $em;
        $this->class = $class;
    }

    /**
     * {@inheritDoc}
     */
    public function save(ExamHasQuestionsInterface $examHasQuestions)
    {
        $this->em->persist($examHasQuestions);
        $this->em->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function findOneBy(array $criteria)
    {
        return $this->em->getRepository($this->class)->findOneBy($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function findBy(array $criteria)
    {
        return $this->em->getRepository($this->class)->findBy($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(ExamHasQuestionsInterface $examHasQuestions)
    {
        $this->em->remove($examHasQuestions);
        $this->em->flush();
    }
}
