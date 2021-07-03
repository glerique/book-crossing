<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Entity\Box;
use App\Model\BoxManager;
use App\Controller\Controller;



class BoxController extends Controller
{

    private $model;



    public function __construct()
    {
        $this->model = new BoxManager();
    }

    public function index()
    {
        $boxes = $this->model->findAll();

        Renderer::render("box/listing", compact('boxes'));
    }


    public function newView()
    {
        Renderer::render("author/new");
    }

    public function new()
    {
        $boxName = filter_input(INPUT_POST, 'boxName', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$boxName) {
            $this->redirectWithError(
                "/book-crossing/box/new",
                "Merci de bien remplir le formulaire !"

            );
        }
        $manager = $this->model;
        $box = new Box;
        $box->setBoxName($boxName);
        $manager->add($box);

        $this->redirectWithSuccess(
            "/book-crossing/boxes",
            "Auteur ajouté avec succès"
        );
    }


    public function editView($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/boxes",
                "Merci de renseigner un id"
            );
        }
        $manager = $this->model;
        $box = $manager->findById($id);
        if (!$box) {
            $this->redirectWithError(
                "/book-crossing/authors",
                "Vous essayé de modifier une boite qui n'existe pas !"
            );
        }
        Renderer::Render("box/edit", compact('box'));
    }

    public function update()
    {

        $id = (int)$_POST['id'];
        $boxName = filter_input(INPUT_POST, 'boxName', FILTER_SANITIZE_SPECIAL_CHARS);


        if (!$id || !$boxName) {
            $this->redirectWithError(
                "/book-crossing/boxes",
                "Merci de bien remplir le formulaire !"

            );
        }

        $manager = $this->model;
        $box = new Box;
        $box->setId($id);
        $box->setBoxName($boxName);
        $manager->update($box);

        $this->redirectWithSuccess(
            "/book-crossing/boxes",
            "Boite modifié avec succès"
        );
    }

    public function delete($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/boxes",
                "Merci de renseigner un id"
            );
        }
        $manager = $this->model;
        $box = $manager->findById($id);
        if (!$box) {
            $this->redirectWithError(
                "/book-crossing/boxes",
                "Vous essayé de supprimer un autheur qui n'existe pas !"
            );
        }
        $manager->deleteById($box);

        $this->redirectWithSuccess(
            "/book-crossing/boxes",
            "Auteur supprimé avec succès"
        );
    }
}
