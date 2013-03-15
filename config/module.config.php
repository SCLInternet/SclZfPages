<?php

namespace SclZfPages;

return array(
    'controllers' => array(
        'invokables' => array(
            'SclZfPages\Controller\Content'  => 'SclZfPages\Controller\ContentController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'cms' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'       => '/content',
                    'defaults' => array(
                        'controller' => 'SclZfPages\Controller\Content',
                        'action'     => 'view',
                        'page'       => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'view' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'       => '/:page',
                            'constraints' => array(
                                'page'  => '[a-zA-Z0-9][a-zA-Z0-9_.-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'SclZfPages\Controller\Content',
                                'action'     => 'view',
                                'page'       => 'index',
                            ),
                        ),
                    ),
                    'edit' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'       => '/edit[/:id]',
                            'constraints' => array(
                                'id'  => '[1-9][0-9]*',
                            ),
                            'defaults' => array(
                                'controller' => 'SclZfPages\Controller\Content',
                                'action'     => 'edit',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'SclZfPages\Controller\Customer' => __DIR__ . '/../view',
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml/doctrine-entities'
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ => __NAMESPACE__ . '_driver',
                ),
            ),
        ),
    ),
);
