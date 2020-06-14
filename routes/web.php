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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts','PagesController@posts');


Route::get('/posts/{post}','PagesController@post');



Route::get('/about','PagesController@about');



Route::get('/category/{name}','PagesController@category');



Route::get('/register','RegistrationController@create');

Route::post('/register','RegistrationController@store');


Route::get('login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');






// These links have been abbreviated  in down at || ROUTE GROUP FOR ADMIN  ||
//

//    Route::get('/admin',[
//        'uses'      =>  'PagesController@admin',
//        'as'         =>  'content.admin',
//        'middleware' =>  'roles',
//        'roles'      =>  ['admin'],
//
//        ]);
//
//
//
//    Route::post('/add-role',[
//        'uses'      =>  'PagesController@addRole',
//        'as'         =>  'content.admin',
//        'middleware' =>  'roles',
//        'roles'      =>  ['admin'],
//
//    ]);


//  the end---------------
//
//
Route::group(['middleware' => 'roles', 'roles' => ['admin']],
    function ()
    {
        Route::get('/admin','PagesController@admin');
        Route::post('/add-role','PagesController@addRole');
        Route::get('/statistics', 'PagesController@statistics');
        Route::get('/post/update/{id}', 'PagesController@edit');
        Route::post('/post/update/{id}', 'PagesController@update');
        Route::get('/post/delete/{id}', 'PagesController@delete');



    });



Route::group(['middleware' => 'roles', 'roles' => ['Editor','Admin']],
    function ()
    {
        Route::get('/editor','PagesController@editor');

        Route::get('/add-post','PagesController@addpost');



        Route::post('/add-post/','PagesController@store');



    });


Route::group(['middleware' => 'roles', 'roles' => ['User','Editor','Admin']],
    function ()
    {
        Route::post('/post/{post}/store','CommentController@store');


    });
