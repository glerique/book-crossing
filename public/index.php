<?php


use App\Lib\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

session_start();

//define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
//define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

$router = new Router($_GET['url']);

$router->get('/', 'App\Controller\BookController@paginate');

$router->get('/books', 'App\Controller\BookController@paginate');
$router->get('/books/:id', 'App\Controller\BookController@show');
$router->post('/book/create', 'App\Controller\BookController@new');
$router->get('/book/new', 'App\Controller\BookController@newView');
$router->get('/book/:id', 'App\Controller\BookController@show');
$router->get('/book/edit/:id', 'App\Controller\BookController@editView');
$router->post('/book/update', 'App\Controller\BookController@update');
$router->get('/book/delete/:id', 'App\Controller\BookController@delete');

$router->get('/authors', 'App\Controller\AuthorController@paginate');
$router->get('/authors/:id', 'App\Controller\AuthorController@index');
$router->post('/author/create', 'App\Controller\AuthorController@new');
$router->get('/author/new', 'App\Controller\AuthorController@newView');
$router->get('/author/:id', 'App\Controller\AuthorController@show');
$router->get('/author/edit/:id', 'App\Controller\AuthorController@editView');
$router->post('/author/update', 'App\Controller\AuthorController@update');
$router->get('/author/delete/:id', 'App\Controller\AuthorController@delete');

$router->get('/boxes', 'App\Controller\BoxController@index');
$router->post('/box/create', 'App\Controller\BoxController@new');
$router->get('/box/new', 'App\Controller\BoxController@newView');
$router->get('/box/:id', 'App\Controller\BoxController@show');
$router->get('/box/edit/:id', 'App\Controller\BoxController@editView');
$router->post('/box/update', 'App\Controller\BoxController@update');
$router->get('/box/delete/:id', 'App\Controller\BoxController@delete');

$router->get('/categories', 'App\Controller\CategoryController@index');
$router->post('/category/create', 'App\Controller\CategoryController@new');
$router->get('/category/new', 'App\Controller\CategoryController@newView');
$router->get('/category/:id', 'App\Controller\CategoryController@show');
$router->get('/category/edit/:id', 'App\Controller\CategoryController@editView');
$router->post('/category/update', 'App\Controller\CategoryController@update');
$router->get('/category/delete/:id', 'App\Controller\CategoryController@delete');

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
