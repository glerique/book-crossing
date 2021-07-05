<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Entity\Category;
use App\Model\CategoryManager;
use App\Controller\Controller;



class CategoryController extends Controller
{

    private $model;



    public function __construct()
    {
        $this->model = new CategoryManager();
    }

    public function index()
    {
        $categories = $this->model->findAll();

        Renderer::render("category/listing", compact('categories'));
    }


    public function newView()
    {
        Renderer::render("category/new");
    }

    public function new()
    {
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$categoryName) {
            $this->redirectWithError(
                "/book-crossing/category/new",
                "Merci de bien remplir le formulaire !"
            );
        }
        $manager = $this->model;
        $category = new Category;
        $category->setCategoryName($categoryName);
        $manager->add($category);

        $this->redirectWithSuccess(
            "/book-crossing/categories",
            "Categorie ajouté avec succès"
        );
    }


    public function editView($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/categories",
                "Merci de renseigner un id"
            );
        }
        $manager = $this->model;
        $category = $manager->findById($id);
        if (!$category) {
            $this->redirectWithError(
                "/book-crossing/categories",
                "Vous essayé de modifier une categorie qui n'existe pas !"
            );
        }
        Renderer::Render("category/edit", compact('category'));
    }

    public function update()
    {

        $id = (int)$_POST['id'];
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_SPECIAL_CHARS);


        if (!$id || !$categoryName) {
            $this->redirectWithError(
                "/book-crossing/categories",
                "Merci de bien remplir le formulaire !"

            );
        }

        $manager = $this->model;
        $category = new Category;
        $category->setId($id);
        $category->setCategoryName($categoryName);
        $manager->update($category);

        $this->redirectWithSuccess(
            "/book-crossing/categories",
            "Categorie modifiée avec succès"
        );
    }

    public function delete($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/categories",
                "Merci de renseigner un id"
            );
        }
        $manager = $this->model;
        $category = $manager->findById($id);
        if (!$category) {
            $this->redirectWithError(
                "/book-crossing/categories",
                "Vous essayé de supprimer une categorie qui n'existe pas !"
            );
        }
        $manager->deleteById($category);

        $this->redirectWithSuccess(
            "/book-crossing/categories",
            "Auteur supprimé avec succès"
        );
    }
}
