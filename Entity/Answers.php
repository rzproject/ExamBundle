<?php

namespace Rz\ExamBundle\Entity;

use Rz\ExamBundle\Model\Answers as BaseAnswers;

class Answers extends BaseAnswers
{
    public function __toString() {
        //return $this->getDescription() ?: 'n/a';
        return '-';
    }

    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime);
        $this->setUpdatedAt(new \DateTime);
    }

    public function preUpdate()
    {
        $this->setUpdatedAt(new \DateTime);
    }
}
