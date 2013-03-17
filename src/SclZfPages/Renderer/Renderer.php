<?php

namespace SclZfPages\Renderer;

use SclZfPages\Entity\PageInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

/**
 * Prepares the page for rendering.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class Renderer implements EventManagerAwareInterface
{
    const EVENT_MANAGER_INDENTIFIER = __CLASS__;

    const RENDER_EVENT = 'render';

    /**
     * The event manager.
     *
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * Factory for fetching formatters.
     *
     * @var FormatterFactoryInterface
     */
    protected $formatManager;

    /**
     * Inject the formatter factory.
     *
     * @param FormatterFactoryInterface $formatManager
     */
    public function __construct(FormatterManager $formatManager)
    {
        $this->formatManager = $formatManager;
    }

    /**
     * {@inheritDoc}
     *
     * @param  EventManagerInterface $eventManager
     * @return self
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;

        $eventManager->setIdentifiers(array(__CLASS__, get_called_class()));

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        return $this->eventManager;
    }

    /**
     * Prepares the page for rendering.
     *
     * @param  PageInterface $page
     * @return PageInterface
     */
    public function render(PageInterface $page)
    {
        // Use a copy incase it gets modified.
        $renderPage = clone $page;

        $this->formatManager->addFormatter($page->getFormat());

        $this->eventManager->trigger(self::RENDER_EVENT, $renderPage);

        return $renderPage;
    }
}
