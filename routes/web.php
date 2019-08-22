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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Users
$router->get('/users/', 'UserController@index');
$router->post('/users/', 'UserController@store');
$router->get('/users/{user_id}', 'UserController@show');
$router->put('/users/{user_id}', 'UserController@update');
$router->delete('/users/{user_id}', 'UserController@destroy');

// Posts
$router->get('/posts','PostController@index');
$router->post('/posts','PostController@store');
$router->get('/posts/{post_id}','PostController@show');
$router->put('/posts/{post_id}', 'PostController@update');
$router->delete('/posts/{post_id}', 'PostController@destroy');

// Comments
$router->get('/comments', 'CommentController@index');
$router->get('/comments/{comment_id}', 'CommentController@show');

// Comments of a Post
$router->get('/posts/{post_id}/comments', 'PostCommentController@index');
$router->post('/posts/{post_id}/comments', 'PostCommentController@store');
$router->put('/posts/{post_id}/comments/{comment_id}', 'PostCommentController@update');
$router->delete('/posts/{post_id}/comments/{comment_id}', 'PostCommentController@destroy');
