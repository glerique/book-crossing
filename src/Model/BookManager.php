<?php

namespace App\Model;

use PDO;
use App\Entity\Book;
use App\Model\Model;
use App\Model\CategoryManager;



class BookManager extends Model
{
    protected $table = 'book';
    protected $class  = 'App\Entity\Book';
    protected $objet = 'new Book()';


    public function PaginateFindAll($currentPage, $perPage)
    {
        $first = ($currentPage * $perPage) - $perPage;
        $req = $this->db->prepare("SELECT * FROM $this->table ORDER BY id DESC LIMIT :premier, :perpage");
        $req->bindValue(':premier', $first, PDO::PARAM_INT);
        $req->bindValue(':perpage', $perPage, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $books =  $req->fetchAll();
        foreach ($books as $book) {
            $categoryManager = new CategoryManager();
            $book->setCategory($categoryManager->findById($book->getCategoryId()));
            $authorManager = new AuthorManager();
            $book->setAuthor($authorManager->findById($book->getAuthorId()));
        }

        return $books;
    }

    public function add(Book $book)
    {

        $req = $this->db->prepare("INSERT INTO $this->table (title, pages, authorId, categoryId, boxId, archived) 
                VALUES (:title, :pages, :authorId, :categoryId, :boxId, :archived)");
        $req->bindvalue(':title', $book->getTitle());
        $req->bindvalue(':pages', $book->getPages());
        $req->bindvalue(':authorId', $book->getAuthorId());
        $req->bindvalue(':categoryId', $book->getCategoryId());
        $req->bindvalue(':boxId', $book->getBoxId());
        $req->bindvalue(':archived', $book->getArchived());

        $req->execute();
    }

    public function update(Book $book)
    {
        $req = $this->db->prepare("UPDATE $this->table SET  title = :title, pages = :pages,
                                                                authorId = :authorId, categoryId = :categoryId,
                                                                    boxId = :boxId, archived = :archived  WHERE id = :id");
        $req->bindvalue(':title', $book->getTitle());
        $req->bindvalue(':pages', $book->getPages());
        $req->bindvalue('authorId', $book->getAuthorId());
        $req->bindvalue(':categoryId', $book->getCategoryId());
        $req->bindvalue(':boxId', $book->getBoxId());
        $req->bindvalue(':archived', $book->getArchived());
        $req->bindvalue(':id', $book->getId());
        $req->execute();
    }
}
