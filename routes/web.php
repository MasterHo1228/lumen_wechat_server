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

/*-------------------------UsersController-------------------------*/

$app->get('/users', 'UsersController@users');
$app->get('/user/{openID}', 'UsersController@user');

/*-------------------------MaterialController-------------------------*/
$app->get('/media/{mediaID}', 'MaterialsController@getMedia');

$app->get('/image/upload', 'MaterialsController@imageUpload');
$app->get('/image', 'MaterialsController@imageList');

$app->get('/audio/upload', 'MaterialsController@audioUpload');
$app->get('/audio', 'MaterialsController@audioList');

$app->get('/video/upload', 'MaterialsController@videoUpload');
$app->get('/video', 'MaterialsController@videoList');

$app->get('/article/upload', 'MaterialsController@articleUpload');
$app->get('/article', 'MaterialsController@articleList');