<?php

namespace App\Controller;

use App\Controller\Controller;


class BookController extends Controller
{


    public function index()
    {
        echo "ici c'est l'index";
    }

    public function show($id)
    {

        echo "ici c'est larticle $id";
    }
}
