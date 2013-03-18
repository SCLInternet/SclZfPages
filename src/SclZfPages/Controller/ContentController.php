<?php

namespace SclZfPages\Controller;

use SclZfPages\Exception\PageFetchException;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Display and manage the content of the page.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class ContentController extends AbstractActionController
{
    /**
     * Displays the page from the database.
     *
     * @return array
     */
    public function viewAction()
    {
        $slug = $this->params('page');

        /* @var $storage \SclZfPages\Storage\StorageInterface */
        $storage = $this->getServiceLocator()->get('SclZfPages\Storage\StorageInterface');

        try {
            $page = $storage->getBySlug($slug);
        } catch (PageFetchException $e) {
            // @todo Log exception
            $response = $this->getResponse();
            $response->setStatusCode($response::STATUS_CODE_500);
            // @todo What should be returned here?
            return;
        }

        if (null === $page) {
            $response = $this->getResponse();
            $response->setStatusCode($response::STATUS_CODE_404);
            // @todo What should be returned here?
            return;
        }

        $renderer = $this->getServiceLocator()->get('SclZfPages\Renderer\Renderer');

        return array('page' => $renderer->render($page));
    }

    public function editAction()
    {
        return array();
    }
}
