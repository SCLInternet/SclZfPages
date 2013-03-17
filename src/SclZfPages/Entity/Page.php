<?php

namespace SclZfPages\Entity;

/**
 * Entity for storing the page content.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class Page implements PageInterface
{
    /**
     * The database record id.
     *
     * @var integer
     */
    protected $id;

    /**
     * The human readable URL part.
     *
     * @var string
     */
    protected $slug;

    /**
     * The format of the page content.
     *
     * @var string
     */
    protected $format;

    /**
     * The page title.
     *
     * @var string
     */
    protected $title;

    /**
     * The page body.
     *
     * @var string
     */
    protected $content;

    /**
     * {@inheritDoc}
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     *
     * @param  integer $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * {@inheritDoc}
     *
     * @param  string $slug
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = (string) $slug;
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * {@inheritDoc}
     *
     * @param  string $format
     * @return self
     */
    public function setFormat($format)
    {
        $this->format = (string) $format;
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritDoc}
     *
     * @param  string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = (string) $title;
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * {@inheritDoc}
     *
     * @param  string $content
     * @return self
     */
    public function setContent($content)
    {
        $this->content = (string) $content;
        return $this;
    }
}
