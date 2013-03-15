<?php

namespace SclZfPages\Storage;

use SclZfPages\Entity\Page;

/**
 * Interface for page storage and retrieval.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
interface StorageInterface
{
    /**
     * Fetches the requested page from the database.
     *
     * @param  string $slug
     * @return Page|null
     */
    public function getBySlug($slug);

    /**
     * Saves the page to the database.
     *
     * @param Page $page
     */
    public function savePage(Page $page);
}
