<?php

namespace SclZfPages\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;

/**
 * @author Tom Oram
 * @ORM\Entity
 * @ORM\Table(name="cms_page")
 * @Form\Hydrator("Zend\Stdlib\Hydrator\ArraySerializable")
 * @Form\Name("cms_page")
 */
class Page
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Form\Type("Zend\Form\Element\Hidden")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Form\Type("Zend\Form\Element\Text")
     * @Form\Options({"label":"Slug"})
     * @Form\Validator({"name": "StringLength", "options": {"min":3, "max": 100}})
     * @Form\Attributes({"id": "cmspage-form-slug"})
     */
    private $slug;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Form\Type("Zend\Form\Element\Text")
     * @Form\Options({"label":"Slug"})
     * @Form\Validator({"name": "StringLength", "options": {"min":0, "max": 200}})
     * @Form\Attributes({"id": "cmspage-form-title"})
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Form\Type("Zend\Form\Element\Textarea")
     * @Form\Options({"label":"Content"})
     * @Form\Validator({"name": "StringLength", "options": {"min":0, "max": 200}})
     * @Form\Attributes({"id": "cmspage-form-content"})
     */
    private $content;

    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param integer $id
     * @return Page
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
     * @return Page
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
     * @return Page
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
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}
