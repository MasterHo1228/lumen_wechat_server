<?php

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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/server', 'WechatController@serve');
$app->post('/server', 'WechatController@serve');

$app->get('/users', 'UsersController@users');
$app->get('/user/{openID}', 'UsersController@user');

$app->get('/image', 'MaterialsController@image');
$app->get('/audio', 'MaterialsController@audio');
$app->get('/video', 'MaterialsController@video');
$app->get('/article', 'MaterialsController@article');