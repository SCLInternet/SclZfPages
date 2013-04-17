<?php

namespace SclZfPages\Storage;

use Doctrine\Common\Persistence\ObjectManager;
use SclZfPages\Entity\Page;
use SclZfPages\Exception\PageFetchException;

/**
 * Provides storage using the Doctrine ORM.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class DoctrineStorage implements StorageInterface
{
    /**
     * The doctrine ORM entity manager
     *
     * @var ObjectManager
     */
    protected $entityManager;

    /**
     * Initialise the class.
     *
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritDoc}
     *
     * @param  string $slug
     * @return Page|null
     * @throws PageFetchException
     */
    public function getBySlug($slug)
    {
        $pages = $this->entityManager->getRepository('SclZfPages\Entity\Page')
            ->findBy(array('slug' => $slug));

        $noPages = count($pages);

        if ($noPages > 1) {
            throw new PageFetchException('More than 1 page object has been returned.');
        }

        if ($noPages === 0) {
            return null;
        }

        return $pages[0];
    }

    /**
     * {@inheritDoc}
     *
     * @param Page $page
    */
    public function savePage(Page $page)
    {
        $this->entityManager->persist($page);
        $this->entityManager->flush();
    }
}
