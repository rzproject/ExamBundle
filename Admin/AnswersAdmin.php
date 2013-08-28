<?php

namespace Rz\ExamBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AdminInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;

class AnswersAdmin extends Admin
{

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('description')
            ->add('content')
            ->add('isRight')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('question')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('description', null, array('footable'=>array('attr'=>array('data_toggle'=>true))))
        ->add('question.description', null, array('editable' => true, 'footable'=>array('attr'=>array('data_hide'=>'phone'))))
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->with('Details')
            ->add('description', null, array('required' => true))
            ->add('content', 'rz_ckeditor', array('required' => false))
        ->end()
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('description')
        ->add('question.description');
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {
    }
}
