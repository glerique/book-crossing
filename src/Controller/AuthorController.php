<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Entity\Author;
use App\Lib\Pagination;
use App\Model\AuthorManager;
use App\Controller\Controller;



class AuthorController extends Controller
{

    private $model;



    public function __construct()
    {
        $this->model = new AuthorManager();
    }

    public function index($id = 1)
    {
        $id = (int)$id;
        if (!is_int($id)) {
            $this->redirect(
                "/book-crossing/authors"
            );
        }


        $total = $this->model->count();
        $pagination = new Pagination($total, $id);
        $pages = $pagination->getPages();
        $currentPage = $pagination->getCurrentPage();
        $perPage = $pagination->getPerPage();
        $authors = $this->model->PaginateFindAll($id, $perPage);
        if (!$authors) {
            $this->redirectWithError(
                "/book-crossing/authors/1",
                "Vous essayez de consulter une page qui n'existe pas !"
            );
        }

        Renderer::render("author/listing", compact('authors', 'currentPage', 'pages'));
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
        $author = $this->model->findById($id);
        if (!$author) {
            $this->redirectWithError(
                "/book-crossing/authors",
                "Vous essayé de consulter un service qui n'existe pas !"
            );
        }
        Renderer::render("author/details", compact('author'));
    }



    public function newView()
    {
        Renderer::render("author/new");
    }

    public function new()
    {
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$lastName) {
            $this->redirectWithError(
                "/book-crossing/author/new",
                "Merci de bien remplir au minimum le nom !"

            );
        }
        $manager = $this->model;
        $author = new Author;
        $author->setFirstName($firstName);
        $author->setLastName($lastName);
        $manager->add($author);

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
        $author = $manager->findById($id);
        if (!$author) {
            $this->redirectWithError(
                "/book-crossing/authors",
                "Vous essayé de modifier un auteur qui n'existe pas !"
            );
        }
        Renderer::Render("author/edit", compact('author'));
    }

    public function update()
    {

        $id = (int)$_POST['id'];
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$id || !$lastName) {
            $this->redirectWithError(
                "/book-crossing/authors",
                "Merci de bien remplir le formulaire !"

            );
        }

        $manager = $this->model;
        $author = new Author;
        $author->setId($id);
        $author->setLastName($lastName);
        $author->setFirstName($firstName);
        $manager->update($author);

        $this->redirectWithSuccess(
            "/book-crossing/authors",
            "Auteur modifié avec succès"
        );
    }

    public function delete($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/authors",
                "Merci de renseigner un id"
            );
        }
        $manager = $this->model;
        $author = $manager->findById($id);
        if (!$author) {
            $this->redirectWithError(
                "/book-crossing/authors",
                "Vous essayé de supprimer un autheur qui n'existe pas !"
            );
        }
        $manager->deleteById($author);

        $this->redirectWithSuccess(
            "/book-crossing/authors",
            "Auteur supprimé avec succès"
        );
    }
}
