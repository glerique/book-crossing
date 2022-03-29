<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Entity\Box;
use App\Controller\Controller;



class BoxController extends Controller
{
    protected $entity = "box";
    protected $modelName = "BoxManager";
    protected $results = "boxes";



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
}
