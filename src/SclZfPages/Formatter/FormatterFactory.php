<?php

namespace SclZfPages\Formatter;

use SclZfPages\Formatter\FormatterInterface;
use SclZfPages\Options\Options;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FormatterFactory implements
    FormatterFactoryInterface,
    ServiceLocatorAwareInterface
{
    /**
     * The modules configuration options.
     *
     * @var Options
     */
    protected $options;

    /**
     * The service locator.
     *
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * Inject the options.
     *
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    /**
     * {@inheritDoc}
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return self
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    public function listFormatters()
    {
        return $this->options->getFormatters();
    }

    /**
     * {@inheritDoc}
     *
     * @param  string $name
     * @return FormatterInterface
     */
    public function get($name)
    {
        $formatters = $this->listFormatters();

        if (!isset($formatters[$name])) {
            return null;
        }

        if (!$this->getServiceLocator()->has($formatters[$name])) {
            return null;
        }

        $formatter = $this->getServiceLocator()->get($formatters[$name]);

        return $formatter;
    }

    /**
     * {@inheritDoc}
     *
     * @return FormatterInterface
     */
    public function getDefaultFormatter()
    {
        return $this->get($this->options->getDefaultFormatter());
    }
}
