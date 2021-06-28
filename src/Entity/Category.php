<?php

namespace App\Entity;


class Category
{

    private $id;
    private $name;



    /**
     * Getters
     */

    public function getId()
    {
        $this->id;
    }

    public function getName()
    {
        $this->name;
    }

    /**
     * Setters
     */

    public function SetId($id)
    {
        $this->id = $id;
        return $id;
    }


    public function setName($name)
    {
        $this->name = $name;
        return $name;
    }
}
