<?php

namespace App\Entity;

class Box
{

    private $id;
    private $boxName;



    /**
     * Getters
     */

    public function getId()
    {
        return $this->id;
    }

    public function getBoxName()
    {
        return $this->boxName;
    }


    /**
     *Setters    
     */

    public function setId($id)
    {
        $this->id = $id;
        return $id;
    }

    public function setBoxName($boxName)
    {
        $this->boxName = $boxName;
        return $boxName;
    }
}
