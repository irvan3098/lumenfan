<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login', 'UserController@login'); 
$router->get('/users/login', 'UserController@getUserLogin');

    
$router->group(['middleware' => 'auth'], function() use($router){
    $router->get('/users', 'UserController@index');
    $router->get('/users/{id}', 'UserController@index');
    $router->get('/approve/{id}', 'UserController@approve');
    
    $router->post('/presenece', 'PreseneceController@tambah');


    
});



