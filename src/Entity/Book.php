<?php

namespace App\Entity;

class book
{

    private $id;
    private $title;
    private $pages;
    private $authorId;
    private $categoryId;
    private $boxId;
    private $archived;

    public function __construct()
    {
        $this->boxId = 1;
        $this->archived = 0;
    }

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

    public function getPages()
    {
        return $this->pages;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getCategory()
    {
        return $this->category;
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

    public function setAuthor($author)
    {
        $this->author = $author;
        return $author;
    }


    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $categoryId;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $category;
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
