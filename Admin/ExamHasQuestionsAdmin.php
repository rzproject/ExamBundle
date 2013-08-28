<?php

namespace Rz\ExamBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class ExamHasQuestionsAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->add('question', 'sonata_type_model_list', array('required' => false, 'attr'=>array('class'=>'span12')))
        ->add('enabled', null, array('required' => false))
        ->add('position', 'hidden')
        ;
    }

    /**
     * @param  \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('exam')
        ->add('question')
        ->add('position')
        ->add('enabled')
        ;
    }
}
