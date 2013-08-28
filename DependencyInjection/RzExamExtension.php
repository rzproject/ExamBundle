<?php

namespace Rz\ExamBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\Config\Definition\Processor;
use Sonata\EasyExtendsBundle\Mapper\DoctrineCollector;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class RzExamExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('admin.xml');
        $loader->load('doctrine_orm.xml');
        $loader->load('services.xml');

        $this->registerDoctrineMapping($config);
        $this->configureClass($config, $container);
        $this->configureAdmin($config, $container);
        $this->configureRzTemplates($config, $container);
    }

    /**
     * @param array                                                   $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function configureClass($config, ContainerBuilder $container)
    {
        // admin configuration
        $container->setParameter('rz_exam.admin.exam.entity',       $config['class']['exam']);
        $container->setParameter('rz_exam.admin.exam_has_questions.entity',       $config['class']['exam_has_questions']);
        $container->setParameter('rz_exam.admin.question.entity', $config['class']['question']);
        $container->setParameter('rz_exam.admin.answers.entity', $config['class']['answers']);

        // manager configuration
        $container->setParameter('rz_exam.manager.exam.entity',       $config['class']['exam']);
        $container->setParameter('rz_exam.manager.exam_has_questions.entity',       $config['class']['exam_has_questions']);
        $container->setParameter('rz_exam.manager.question.entity', $config['class']['question']);
        $container->setParameter('rz_exam.manager.answers.entity', $config['class']['answers']);
    }

    /**
     * @param array                                                   $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function configureAdmin($config, ContainerBuilder $container)
    {
        $container->setParameter('rz_exam.admin.exam.class',              $config['admin']['exam']['class']);
        $container->setParameter('rz_exam.admin.exam.controller',         $config['admin']['exam']['controller']);
        $container->setParameter('rz_exam.admin.exam.translation_domain', $config['admin']['exam']['translation']);

        $container->setParameter('rz_exam.admin.exam_has_questions.class',              $config['admin']['exam_has_questions']['class']);
        $container->setParameter('rz_exam.admin.exam_has_questions.controller',         $config['admin']['exam_has_questions']['controller']);
        $container->setParameter('rz_exam.admin.exam_has_questions.translation_domain', $config['admin']['exam_has_questions']['translation']);

        $container->setParameter('rz_exam.admin.question.class',              $config['admin']['question']['class']);
        $container->setParameter('rz_exam.admin.question.controller',         $config['admin']['question']['controller']);
        $container->setParameter('rz_exam.admin.question.translation_domain', $config['admin']['question']['translation']);

        $container->setParameter('rz_exam.admin.answers.class',              $config['admin']['answers']['class']);
        $container->setParameter('rz_exam.admin.answers.controller',         $config['admin']['answers']['controller']);
        $container->setParameter('rz_exam.admin.answers.translation_domain', $config['admin']['answers']['translation']);
    }

    /**
     * @param array                                                   $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     */
    public function configureRzTemplates($config, ContainerBuilder $container)
    {
        $container->setParameter('rz_exam.configuration.exam.templates', $config['admin']['exam']['templates']);
        $container->setParameter('rz_exam.configuration.exam_has_questions.templates', $config['admin']['exam_has_questions']['templates']);
        $container->setParameter('rz_exam.configuration.question.templates', $config['admin']['question']['templates']);
        $container->setParameter('rz_exam.configuration.answers.templates', $config['admin']['answers']['templates']);
    }

    /**
     * @param array $config
     *
     * @return void
     */
    public function registerDoctrineMapping(array $config)
    {
        $collector = DoctrineCollector::getInstance();

        $collector->addAssociation($config['class']['question'], 'mapOneToMany', array(
             'fieldName' => 'answers',
             'targetEntity' => $config['class']['answers'],
             'cascade' =>
             array(
                 0 => 'remove',
                 1 => 'persist',
             ),
             'mappedBy' => 'question',
             'orphanRemoval' => true,
             'orderBy' =>
             array(
                 'createdAt' => 'DESC',
             ),
        ));

        $collector->addAssociation($config['class']['answers'], 'mapManyToOne', array(
             'fieldName' => 'question',
             'targetEntity' => $config['class']['question'],
             'cascade' => array(
             ),
             'mappedBy' => NULL,
             'inversedBy' => 'answers',
             'joinColumns' =>
             array(
                 array(
                     'name' => 'question_id',
                     'referencedColumnName' => 'id',
                 ),
             ),
             'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['question'], 'mapOneToMany', array(
            'fieldName'     => 'examHasQuestions',
            'targetEntity'  => $config['class']['exam_has_questions'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => 'question',
            'orphanRemoval' => false,
        ));


        $collector->addAssociation($config['class']['exam_has_questions'], 'mapManyToOne', array(
            'fieldName'     => 'exam',
            'targetEntity'  => $config['class']['exam'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => NULL,
            'inversedBy'    => 'examHasQuestions',
            'joinColumns'   =>  array(
                array(
                    'name'  => 'exam_id',
                    'referencedColumnName' => 'id',
                ),
            ),
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['exam_has_questions'], 'mapManyToOne', array(
            'fieldName'     => 'question',
            'targetEntity'  => $config['class']['question'],
            'cascade'       => array(
                 'persist',
            ),
            'mappedBy'      => NULL,
            'inversedBy'    => 'examHasQuestions',
            'joinColumns'   => array(
                array(
                    'name'  => 'question_id',
                    'referencedColumnName' => 'id',
                ),
            ),
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['exam'], 'mapOneToMany', array(
            'fieldName'     => 'examHasQuestions',
            'targetEntity'  => $config['class']['exam_has_questions'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => 'exam',
            'orphanRemoval' => true,
            'orderBy'       => array(
                'position'  => 'ASC',
            ),
        ));
    }
}
