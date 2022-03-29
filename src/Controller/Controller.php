<?php

namespace App\Controller;

use App\Lib\Http;
use App\Lib\Session;
use App\Lib\Renderer;
use App\Lib\Pagination;

abstract class Controller
{
    protected $entity;
    protected $model;
    protected $modelName;

    public function __construct()
    {
        $realModelName = "App\\Model\\" . $this->modelName;
        $this->model = new $realModelName();
    }

    public function index()
    {
        $results = $this->model->findAll();

        Renderer::render("$this->entity/listing", compact('results'));
    }

    public function paginate($id = 1)
    {
        $id = (int)$id;
        if (!is_int($id)) {
            $this->redirect(
                "/book-crossing/$this->path"
            );
        }

        $total = $this->model->count();
        $pagination = new Pagination($total, $id);
        $pages = $pagination->getPages();
        $currentPage = $pagination->getCurrentPage();
        $perPage = $pagination->getPerPage();
        $results = $this->model->PaginateFindAll($id, $perPage);
        if (!$results) {
            $this->redirectWithError(
                "/book-crossing/$this->path/1",
                "Vous essayez de consulter une page qui n'existe pas !"
            );
        }

        Renderer::render("$this->entity/listing", compact('results', 'currentPage', 'pages'));
    }

    public function show($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/$this->path",
                "Merci de renseigner un id"
            );
        }
        $result = $this->model->findById($id);
        if (!$result) {
            $this->redirectWithError(
                "/book-crossing/$this->path",
                "Vous essayez de consulter une ressource qui n'existe pas !"
            );
        }
        Renderer::render("$this->entity/details", compact('result'));
    }

    public function newView()
    {
        Renderer::render("$this->entity/new");
    }

    public function editView($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/$this->path",
                "Merci de renseigner un id"
            );
        }

        $result = $this->model->findById($id);
        if (!$result) {
            $this->redirectWithError(
                "/book-crossing/$this->path",
                "Vous essayé de modifier une ressource qui n'existe pas !"
            );
        }
        Renderer::Render("$this->entity/edit", compact('result'));
    }

    public function delete($id)
    {
        $id = (int)$id;
        if (!$id or !is_int($id)) {
            $this->redirectWithError(
                "/book-crossing/$this->path",
                "Merci de renseigner un id"
            );
        }
        $result = $this->model->findById($id);
        if (!$result) {
            $this->redirectWithError(
                "/book-crossing/categories",
                "Vous essayez de supprimer une ressource qui n'existe pas !"
            );
        }
        $this->model->deleteById($result);

        $this->redirectWithSuccess(
            "/book-crossing/$this->path",
            "Ressource supprimé avec succès"
        );
    }


    protected function redirectWithError(string $url, string $message)
    {
        Session::addFlash('error', $message);
        Http::redirect($url);
    }

    protected function redirectWithSuccess(string $url, string $message)
    {
        Session::addFlash('success', $message);
        Http::redirect($url);
    }

    protected function redirect(string $url)
    {
        Http::redirect($url);
    }
}
