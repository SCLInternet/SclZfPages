<?php

namespace SclZfPages\Controller;

use Zend\Mvc\Controller\AbstractActionController;

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

        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p FROM SclZfPages\Entity\Page p WHERE p.slug = ?1'
        );

        $query->setParameter(1, $slug);
        $pages = $query->getResult();

        if (count($pages) !== 1) {
            $response = $this->getResponse();
            $response->setStatusCode($response::STATUS_CODE_404);
            // @todo should something be returned?
            return;
        }

        return array('page' => $pages[0]);
    }

    public function editAction()
    {
        return array();
    }
}
