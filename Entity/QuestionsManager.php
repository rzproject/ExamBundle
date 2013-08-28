<?php

namespace Rz\ExamBundle\Entity;

use Rz\ExamBundle\Model\QuestionsManager as ModelQuestionsManager;
use Rz\ExamBundle\Model\QuestionsInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\Query;

class QuestionsManager extends ModelAnswersManager
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
    public function save(QuestionsInterface $question)
    {
        $this->em->persist($question);
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
    public function delete(QuestionsInterface $question)
    {
        $this->em->remove($question);
        $this->em->flush();
    }
}
