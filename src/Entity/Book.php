<?php

namespace App\Entity;

class book
{

    private $id;
    private $title;
    private $format;
    private $pages;
    private $authorId;
    private $categoryId;
    private $boxId;
    private $archived;



    /**
     * Getters
     */

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getBoxId()
    {
        return $this->boxId;
    }

    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Setters 
     */

    public function setId($id)
    {
        $this->id = $id;
        return $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $title;
    }

    public function setFormat($format)
    {
        $this->format = $format;
        return $format;
    }

    public function setPages($pages)
    {
        $this->pages = $pages;
        return $pages;
    }


    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $authorId;
    }


    public function setCategoryId($CategoryId)
    {
        $this->CategoryId = $CategoryId;
        return $CategoryId;
    }


    public function setBoxId($BoxId)
    {
        $this->BoxId = $BoxId;
        return $BoxId;
    }


    public function setArchived($archived)
    {
        $this->archived = $archived;
        return $archived;
    }
}
