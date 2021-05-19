<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\webScrapingController;

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

$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');


$router->post('/api/post/kendaraan',            'KendaraanController@insertPengajuan');
$router->get('/api/get/kendaraan/{user_id}',    'KendaraanController@getDataPengajuanByUser');
$router->get('/api/get/kendaraan/view/{id}',    'KendaraanController@getKendaraanbyID');


$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});
