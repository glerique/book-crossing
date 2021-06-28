<?php

namespace App\Entity;

class Author
{


    private $id;
    private $lastName;
    private $firstName;




    /**
     * Getters
     */

    public function getId()
    {
        return $this->id;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }



    /**
     * Setters
     */

    public function setId($id)
    {
        $this->id = $id;
        return $id;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $firstName;
    }
}
