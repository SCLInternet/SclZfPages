<?php

namespace SclZfPages\Service;

use SclZfPages\Entity\Page;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

/**
 * Prepares the page for rendering.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class Renderer implements EventManagerAwareInterface
{
    const RENDER_EVENT = 'render';

    /**
     * The event manager.
     *
     * @var EventManagerInterface
     */
    protected $eventManager;

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
     * @param  Page $page
     * @return Page
     */
    public function render(Page $page)
    {
        // Use a copy incase it gets modified.
        $renderPage = clone $page;

        $this->eventManager->trigger(self::RENDER_EVENT, $renderPage);

        return $page;
    }
}
