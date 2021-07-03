<?php

namespace App\Model;

use App\Model\Model;
use App\Entity\Box;



class BoxManager extends Model
{
    protected $table = 'box';
    protected $class  = 'App\Entity\Box';
    protected $objet = 'new Box()';




    public function add(Box $box)
    {
        $req = $this->db->prepare("INSERT INTO $this->table (boxName) 
                VALUES (:boxName)");
        $req->bindvalue(':boxName', $box->getBoxName());
        $req->execute();
    }

    public function update(Box $box)
    {

        $req = $this->db->prepare("UPDATE $this->table SET  boxName = :boxName  WHERE id = :id");
        $req->bindvalue(':boxName', $box->getBoxName());
        $req->bindvalue(':id', $box->getId());
        $req->execute();
    }
}
