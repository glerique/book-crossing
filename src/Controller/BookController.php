<?php

namespace App\Controller;

use App\Entity\Book;
use App\Lib\Renderer;
use App\Lib\Pagination;
use App\Model\BoxManager;
use App\Model\BookManager;
use App\Model\AuthorManager;
use App\Controller\Controller;
use App\Model\CategoryManager;



class BookController extends Controller
{

    private $model;



    public function __construct()
    {
        $this->model = new BookManager();
    }

    public function index($id = 1)
    {
        $id = (int)$id;
        if (!is_int($id)) {
            $this->redirect(
                "/book-crossing/books"
            );
        }

        $total = $this->model->count();
        $pagination = new Pagination($total, $id);
        $pages = $pagination->getPages();
        $currentPage = $pagination->getCurrentPage();
        $perPage = $pagination->getPerPage();
        $books = $this->model->PaginateFindAll($id, $perPage);
        if (!$books) {
            $this->redirectWithError(
                "/book-crossing/books/1",
                "Vous essayez de consulter une page qui n'existe pas !"
            );
        }

        Renderer::render("book/listing", compact('books', 'currentPage', 'pages'));
    }



    public function show($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/authors",
                "Merci de renseigner un id"
            );
        }
        $book = $this->model->findById($id);
        if (!$book) {
            $this->redirectWithError(
                "/book-crossing/authors",
                "Vous essayé de consulter un livre qui n'existe pas !"
            );
        }
        Renderer::render("book/details", compact('book'));
    }



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

    public function delete($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/books",
                "Merci de renseigner un id"
            );
        }
        $manager = $this->model;
        $author = $manager->findById($id);
        if (!$author) {
            $this->redirectWithError(
                "/book-crossing/books",
                "Vous essayé de supprimer un autheur qui n'existe pas !"
            );
        }
        $manager->deleteById($author);

        $this->redirectWithSuccess(
            "/book-crossing/books",
            "Auteur supprimé avec succès"
        );
    }
}
