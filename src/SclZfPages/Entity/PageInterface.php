<?php

namespace SclZfPages\Entity;

/**
 * Entity for storing the page content.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
interface PageInterface
{
    /**
     * Get the unique page identifier.
     *
     * @return integer
     */
    public function getId();

    /**
     * Set the unique page identifier.
     *
     * @param  integer $id
     * @return self
     */
    public function setId($id);

    /**
     * Get the string used to build the url.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Set the string used to build the url.
     *
     * @param  string $slug
     * @return self
     */
    public function setSlug($slug);

    /**
     * Get the format for the page content.
     *
     * @return string
     */
    public function getFormat();

    /**
     * Set the format for the page content.
     *
     * @param  string $format
     * @return self
     */
    public function setFormat($format);

    /**
     * Get the page title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set the page content.
     *
     * @param  string $title
     * @return self
     */
    public function setTitle($title);

    /**
     * Get the page content.
     *
     * @return string
     */
    public function getContent();

    /**
     * Set the page content.
     *
     * @param string $content
     * @return self
     */
    public function setContent($content);
}
