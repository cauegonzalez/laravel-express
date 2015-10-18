<?php

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', 'TestController@index');

Route::get('ola/{nome}', 'TestController@ola');

Route::get('hello/{nome}', 'TestController@hello');

Route::get('notas', 'TestController@notas');

Route::get('noticias', 'TestController@noticias');

Route::get('news', 'TestController@news');


Route::get('blog', ['as'=>'blog', 'uses'=>'PostsController@index']);

Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController',
]);

// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Route::get('auth', function ()
// {
//     if (Auth::attempt(['email'=>"cauegonzalez@gmail.com", 'password'=>12345]))
//     {
//         return "Login realizado com sucesso: ";
//     }
//     return "Falha ao tentar realizar o Login: ";
// });
// Route::get('auth', function ()
// {
//     $user = \App\User::find(1);

//     Auth::login($user);

//     if (Auth::check())
//     {
//         return "Login realizado com sucesso: ".$user->name;
//     }
// });

// Route::get('auth/logout', function ()
// {
//     Auth::logout();

//     if (!Auth::check())
//     {
//         return "Volte sempre!";
//     }
// });

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function ()
{
    Route::group(['prefix'=>'posts'], function ()
    {
        Route::get('', ['as'=>'admin.posts.index', 'uses'=>'PostsAdminController@index']);
        Route::get('create', ['as'=>'admin.posts.create', 'uses'=>'PostsAdminController@create']);
        Route::post('store', ['as'=>'admin.posts.store', 'uses'=>'PostsAdminController@store']);
        Route::get('edit/{id}', ['as'=>'admin.posts.edit', 'uses'=>'PostsAdminController@edit']);
        Route::put('update/{id}', ['as'=>'admin.posts.update', 'uses'=>'PostsAdminController@update']);
        Route::get('destroy/{id}', ['as'=>'admin.posts.destroy', 'uses'=>'PostsAdminController@destroy']);
    });
});
