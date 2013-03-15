<?php

namespace SclZfPages;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use SclZfPages\Storage\DoctrineStorage;

/**
 * Module which provides basic static page display & management.
 *
 * @author Tom Oram
 */
class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{
    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getServiceConfig()
    {
        return array(
            'aliases' => array(
                'SclZfPages\Storage' => 'SclZfPages\Storage\DoctrineStorage',
            ),
            'invokables' => array(
                'SclZfPages\Service\Renderer' => 'SclZfPages\Service\Renderer',
            ),
            'factories' => array(
                'SclZfPages\Storage\DoctrineStorage' => function ($sm) {
                    return new DoctrineStorage(
                        $sm->get('doctrine.entitymanager.orm_default')
                    );
                }
            ),
        );
    }
}
