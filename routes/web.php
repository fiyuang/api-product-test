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

/**
 * route "/login"
 * @method "POST"
 */
$router->post('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@login']);
$router->post('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

$router->group(['middleware' => ['jwt.auth']], function($router) {
    $router->group(['prefix' => 'product'], function () use ($router) {
        $router->get('/', 'ProductController@index');
        $router->post('/', 'ProductController@invoke');
        $router->get('/{id}', 'ProductController@detail');
        $router->delete('/{id}', 'ProductController@delete');
    });
});
