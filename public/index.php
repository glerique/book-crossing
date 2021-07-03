<?php


use App\Lib\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

session_start();

//define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
//define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

$router = new Router($_GET['url']);

$router->get('/', 'App\Controller\BookController@index');
$router->get('/books', 'App\Controller\BookController@index');
$router->get('/book/:id', 'App\Controller\BookController@show');
$router->get('/authors', 'App\Controller\AuthorController@index');
$router->get('/authors/:id', 'App\Controller\AuthorController@index');
$router->post('/author/create', 'App\Controller\AuthorController@new');
$router->get('/author/new', 'App\Controller\AuthorController@newView');
$router->get('/author', 'App\Controller\AuthorController@show');
$router->get('/author/:id', 'App\Controller\AuthorController@show');
$router->get('/author/edit/:id', 'App\Controller\AuthorController@editView');
$router->post('/author/update', 'App\Controller\AuthorController@update');
$router->get('/author/delete/:id', 'App\Controller\AuthorController@delete');

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
