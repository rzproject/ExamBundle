<?php

namespace Rz\ExamBundle\Entity;

use Rz\ExamBundle\Model\Exam as BaseExam;

class Exam extends BaseExam
{
    public function __toString() {
        return $this->getDescription() ?: 'n/a';
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
