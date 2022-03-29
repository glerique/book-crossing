<?php

namespace App\Controller;

use App\Lib\Renderer;
use App\Entity\Category;
use App\Controller\Controller;



class CategoryController extends Controller
{

    protected $entity = "category";
    protected $modelName = "CategoryManager";
    protected $results = "categories";


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
}
