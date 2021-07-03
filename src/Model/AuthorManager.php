<?php

namespace App\Model;

use PDO;
use App\Model\Model;
use App\Entity\Author;



class AuthorManager extends Model
{
    protected $table = 'author';
    protected $class  = 'App\Entity\Author';
    protected $objet = 'new Author()';


    public function PaginateFindAll($currentPage, $perPage)
    {
        $first = ($currentPage * $perPage) - $perPage;
        $req = $this->db->prepare("SELECT * FROM $this->table ORDER BY id DESC LIMIT :premier, :perpage");
        $req->bindValue(':premier', $first, PDO::PARAM_INT);
        $req->bindValue(':perpage', $perPage, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $authors =  $req->fetchAll();

        return $authors;
    }

    public function add(Author $author)
    {
        $req = $this->db->prepare("INSERT INTO $this->table (lastName, firstName) 
                VALUES (:lastName, :firstName)");
        $req->bindvalue(':lastName', $author->getLastName());
        $req->bindvalue(':firstName', $author->getFirstName());
        $req->execute();
    }

    public function update(Author $author)
    {

        $req = $this->db->prepare("UPDATE $this->table SET  lastName = :lastName, firstName = :firstName  WHERE id = :id");
        $req->bindvalue(':lastName', $author->getLastName());
        $req->bindvalue(':firstName', $author->getFirstName());
        $req->bindvalue(':id', $author->getId());
        $req->execute();
    }
}
