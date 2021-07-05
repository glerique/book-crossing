<?php

namespace App\Entity;


class Category
{

    private $id;
    private $categoryName;



    /**
     * Getters
     */

    public function getId()
    {
        return $this->id;
    }

    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Setters
     */

    public function SetId($id)
    {
        $this->id = $id;
        return $id;
    }


    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
        return $categoryName;
    }
}
