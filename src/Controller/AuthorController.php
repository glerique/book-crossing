<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Entity\Author;
use App\Lib\Pagination;
use App\Controller\Controller;



class AuthorController extends Controller
{
    protected $entity = "author";
    protected $modelName = "AuthorManager";
    protected $results = "authors";


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
}
