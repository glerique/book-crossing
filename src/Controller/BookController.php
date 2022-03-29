<?php

namespace App\Controller;

use App\Entity\Book;
use App\Lib\Renderer;
use App\Lib\Pagination;
use App\Model\BoxManager;
use App\Model\AuthorManager;
use App\Controller\Controller;
use App\Model\CategoryManager;



class BookController extends Controller
{
    protected $entity = "book";
    protected $path = "books";
    protected $modelName = "BookManager";

    public function newView()
    {

        $authorManager = new AuthorManager();
        $authors = $authorManager->findAll();
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();
        Renderer::render("book/new", compact('categories', 'authors'));
    }


    public function new()
    {
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $pages = filter_input(INPUT_POST, 'pages', FILTER_VALIDATE_INT);
        $authorId = filter_input(INPUT_POST, 'authorId', FILTER_VALIDATE_INT);
        $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_VALIDATE_INT);

        if (!$title || !$pages || !$authorId || !$categoryId) {
            $this->redirectWithError(
                "/book-crossing/book/new",
                "Merci de bien remplir le formulaire !"

            );
        }
        $manager = $this->model;
        $book = new Book;
        $book->setTitle($title);
        $book->setPages($pages);
        $book->setAuthorId($authorId);
        $book->setCategoryId($categoryId);
        $manager->add($book);

        $this->redirectWithSuccess(
            "/book-crossing/authors",
            "Auteur ajouté avec succès"
        );
    }


    public function editView($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/authors",
                "Merci de renseigner un id"
            );
        }
        $manager = $this->model;
        $book = $manager->findById($id);
        if (!$book) {
            $this->redirectWithError(
                "/book-crossing/books",
                "Vous essayé de modifier un livre qui n'existe pas !"
            );
        }
        $authorManager = new AuthorManager();
        $authors = $authorManager->findAll();
        $categorieManager = new CategoryManager();
        $categories = $categorieManager->findAll();
        $boxManager = new BoxManager();
        $boxes = $boxManager->findAll();
        Renderer::Render("book/edit", compact('book', 'authors', 'categories', 'boxes'));
    }

    public function update()
    {

        $id = (int)$_POST['id'];
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $pages = filter_input(INPUT_POST, 'pages', FILTER_VALIDATE_INT);
        $authorId = filter_input(INPUT_POST, 'authorId', FILTER_VALIDATE_INT);
        $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_VALIDATE_INT);
        $boxId = filter_input(INPUT_POST, 'boxId', FILTER_VALIDATE_INT);

        if (!$id || !$title || !$authorId || !$categoryId || !$boxId) {
            $this->redirectWithError(
                "/book-crossing/books",
                "Merci de bien remplir le formulaire !"

            );
        }

        $manager = $this->model;
        $book = new Book;
        $book->setId($id);
        $book->setTitle($title);
        $book->setPages($pages);
        $book->setAuthorId($authorId);
        $book->setCategoryId($categoryId);

        $manager->update($book);

        $this->redirectWithSuccess(
            "/book-crossing/books",
            "Livre modifié avec succès"
        );
    }
}
