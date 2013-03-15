<?php

namespace SclZfPages\Entity;

use Zend\Form\Annotation as Form;

/**
 * Entity for storing the page content.
 *
 * @Form\Name("cms_page")
 *
 * @author Tom Oram
 */
class Page
{
    /**
     * The database record id.
     *
     * @var integer
     *
     * @Form\Type("Zend\Form\Element\Hidden")
     */
    private $id;

    /**
     * The human readable URL part.
     *
     * @var string
     *
     * @Form\Type("Zend\Form\Element\Text")
     * @Form\Options({"label":"Slug"})
     * @Form\Validator({"name": "StringLength", "options": {"min":3, "max": 100}})
     * @Form\Attributes({"id": "cmspage-form-slug"})
     */
    private $slug;

    /**
     * The page title.
     *
     * @var string
     *
     * @Form\Type("Zend\Form\Element\Text")
     * @Form\Options({"label":"Slug"})
     * @Form\Validator({"name": "StringLength", "options": {"min":0, "max": 200}})
     * @Form\Attributes({"id": "cmspage-form-title"})
     */
    private $title;

    /**
     * The page body.
     *
     * @var string
     *
     * @Form\Type("Zend\Form\Element\Textarea")
     * @Form\Options({"label":"Content"})
     * @Form\Validator({"name": "StringLength", "options": {"min":0, "max": 200}})
     * @Form\Attributes({"id": "cmspage-form-content"})
     */
    private $content;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param integer $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}
