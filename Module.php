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
                'SclZfPages\Storage\StorageInterface' => 'SclZfPages\Storage\DoctrineStorage',
            ),
            'invokables' => array(
                'SclZfPages\Formatter\Html' => 'SclZfPages\Formatter\Html',
                'SclZfPages\Formatter\PlainText' => 'SclZfPages\Formatter\PlainText',
            ),
            'factories' => array(
                'SclZfPages\Renderer\FormatManager' => function ($sm) {
                    $eventManager = $sm->get('SharedEventManager');
                    $formatterFactory = $sm->get('SclZfPages\Formatter\FormatterFactoryInterface');
                    return new Renderer\FormatterManager($formatterFactory, $eventManager);
                },

                'SclZfPages\Renderer\Renderer' => function ($sm) {
                    $formatManager = $sm->get('SclZfPages\Renderer\FormatManager');
                    return new Renderer\Renderer($formatManager);
                },

                'SclZfPages\Formatter\FormatterFactoryInterface' => function ($sm) {
                    $options = $sm->get('SclZfPages\Options\Options');
                    return new Formatter\FormatterFactory($options);
                },

                'SclZfPages\Options\Options' => function ($sm) {
                    $config = $sm->get('Config');
                    return new Options\Options($config['scl_zf_pages']);
                },

                'SclZfPages\Storage\DoctrineStorage' => function ($sm) {
                    return new DoctrineStorage(
                        $sm->get('doctrine.entitymanager.orm_default')
                    );
                }
            ),
        );
    }
}
