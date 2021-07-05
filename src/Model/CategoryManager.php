<?php

namespace App\Model;

use PDO;
use App\Model\Model;
use App\Entity\Category;



class CategoryManager extends Model
{
    protected $table = 'category';
    protected $class  = 'App\Entity\Category';
    protected $objet = 'new Category()';

    public function findAll()
    {
        $req = $this->db->prepare("SELECT * FROM category");
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Category');
        $categories = $req->fetchAll();
        return $categories;
    }


    public function add(Category $category)
    {
        $req = $this->db->prepare("INSERT INTO $this->table (categoryName) 
                VALUES (:categoryName)");
        $req->bindvalue(':categoryName', $category->getCategoryName());
        $req->execute();
    }

    public function update(Category $category)
    {

        $req = $this->db->prepare("UPDATE $this->table SET  categoryName = :categoryName  WHERE id = :id");
        $req->bindvalue(':categoryName', $category->getCategoryName());
        $req->bindvalue(':id', $category->getId());
        $req->execute();
    }
}
