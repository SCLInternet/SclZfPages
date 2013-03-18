<?php

namespace SclZfPages\Renderer;

use SclZfPages\Formatter\FormatterFactoryInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\SharedEventManagerInterface;

/**
 * This class is used for setting what filters are used to process the content.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class FormatterManager
{
    /**
     * The shared event manager
     *
     * @var SharedEventManagerInterface
     */
    protected $eventManager;

    /**
     * Used to load the formatters.
     *
     * @var FormatterFactoryInterface
     */
    protected $formatterFactory;

    /**
     * Inject the SharedEventManager.
     *
     * @param FormatterFactoryInterface   $formatterFactory
     * @param SharedEventManagerInterface $eventManager
     */
    public function __construct(
        FormatterFactoryInterface $formatterFactory,
        SharedEventManagerInterface $eventManager
    ) {
        $this->eventManager = $eventManager;
        $this->formatterFactory = $formatterFactory;
    }

    /**
     * Fetch the requested formatter.
     *
     * @param  string $formatterName
     * @return FormatterInterface|null
     */
    protected function loadFormatter($formatterName)
    {
        $formatter = $this->formatterFactory->get($formatterName);

        if (null !== $formatter) {
            return $formatter;
        }

        $formatter = $this->formatterFactory->getDefaultFormatter();

        return $formatter;
    }

    /**
     * Adds a filter to be used in the rendering chain.
     *
     * @param  string  $formatterName
     * @param  integer $priority
     * @return self
     */
    public function addFormatter($formatterName, $priority = 0)
    {
        $formatter = $this->loadFormatter($formatterName);

        if (null === $formatter) {
            return $this;
        }

        $this->eventManager->attach(
            Renderer::EVENT_MANAGER_INDENTIFIER,
            Renderer::RENDER_EVENT,
            function (EventInterface $event) use ($formatter) {
                $page = $event->getTarget();
                $page->setContent($formatter->format($page->getContent()));
            }
        );

        return $this;
    }
}