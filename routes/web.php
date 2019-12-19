<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ArticlesController@indexHome');

Route::get('/articles', 'ArticlesController@index');
Route::post('/articles','ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}/edit','ArticlesController@edit');

//the  below is a name route in which we can call it by its name
Route::get('/articles/{article}','ArticlesController@show')->name('articles.show');
//Route::get('/articles/{article}/edit','ArticlesController@edit');
Route::put('/articles/{article}','ArticlesController@update');
//Routes::get('/articles/{article}','ArticlesController@')
Route::get('/about', function () {
    $articles = App\Article::take(3)->latest('updated_at')->get();
    //return $article;
    return view('about',['articles' => $articles]);
});

