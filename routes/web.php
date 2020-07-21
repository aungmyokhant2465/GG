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

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/',[
    'uses'=>'ClientController@getWelcome',
    'as'=>'/'
]);
Route::get('/image/{image_name}',[
    'uses'=>'AdminController@getImage',
    'as'=>'image'
]);
Route::get('/cart/add/{id}',[
    'uses'=>'ClientController@getAddCart',
    'as'=>'cart.add'
]);
Route::get('/by/category/{id}',[
    'uses'=>'ClientController@getByCategory',
    'as'=>'by.category'
]);
Route::get('/search',[
    'uses'=>'ClientController@getSearch',
    'as'=>'search'
]);
Route::get('/detail,{id}',[
    'uses'=>'ClientController@getDetail',
    'as'=>'detail'
]);
Route::group(['prefix'=>'show'],function (){
    Route::get('/cart',[
        'uses'=>'ClientController@getShowCart',
        'as'=>'show.cart'
    ]);
    Route::get('/cart/{id}/increase',[
        'uses'=>'ClientController@getCartItemIncrease',
        'as'=>'item.increase'
    ]);
    Route::get('/cart/{id}/decrease',[
        'uses'=>'ClientController@getCartItemDecrease',
        'as'=>'item.decrease'
    ]);
    Route::get('/cart/cancel',[
        'uses'=>'ClientController@getCartCancel',
        'as'=>'cart.cancel'
    ]);
    Route::post('/checkout',[
        'uses'=>'ClientController@postCheckout',
        'as'=>'checkout'
    ]);

});


Route::group(['prefix'=>'auth'],function (){
    Route::get('/login',[
        'uses'=>'AuthController@getLogin',
        'as'=>'login'
    ]);
    Route::post('/login/post',[
        'uses'=>'AuthController@postLogin',
        'as'=>'login.post'
    ]);
});


Route::group(['prefix'=>'admin','middleware'=>'role:admin'],function(){

    Route::group(['prefix'=>'user'],function(){
        Route::get('/new',[
            'uses'=>'AdminController@getNewUser',
            'as'=>'user.new'
        ]);
        Route::post('/new',[
            'uses'=>'AdminController@postRegister',
            'as'=>'user.new'
        ]);
        Route::get('/users',[
            'uses'=>'AdminController@getUsers',
            'as'=>'users'
        ]);
        Route::get('/delete',[
            'uses'=>'AdminController@getUserDelete',
            'as'=>'user.delete'
        ]);
        Route::post('/update',[
            'uses'=>'AdminController@postUpdateUser',
            'as'=>'user.update'
        ]);
    });
    Route::group(['prefix'=>'category'],function(){
        Route::get('/new',[
            'uses'=>'AdminController@getAddCategory',
            'as'=>'category'
        ]);
        Route::post('/new',[
            'uses'=>'AdminController@postAddCategory',
            'as'=>'category.new'
        ]);
        Route::get('/categories',[
            'uses'=>'AdminController@getCategories',
            'as'=>'categories'
        ]);
    });
    Route::group(['prefix'=>'post'],function (){
        Route::get('/new',[
            'uses'=>'AdminController@getAddPost',
            'as'=>'post.new'
        ]);
        Route::post('/new',[
            'uses'=>'AdminController@postAddPost',
            'as'=>'post.new'
        ]);
        Route::get('/posts',[
            'uses'=>'AdminController@getPosts',
            'as'=>'posts'
        ]);
        Route::get('/delete',[
            'uses'=>'AdminController@getPostDelete',
            'as'=>'post.delete'
        ]);
        Route::get('/edit/{id}',[
            'uses'=>'AdminController@getPostEdit',
            'as'=>'post.edit'
        ]);
        Route::post('/update',[
            'uses'=>'AdminController@postPostUpdate',
            'as'=>'post.update'
        ]);
    });
    Route::group(['prefix'=>'order'],function (){
        Route::get('/order',[
            'uses'=>'OrderController@getOrder',
            'as'=>'order'
        ]);
        Route::get('/status,{id}',[
           'uses'=>'OrderController@getStatus',
           'as'=>'status'
        ]);
        Route::get('/print,{id}',[
            'uses'=>'OrderController@getPrint',
            'as'=>'print'
        ]);
    });


});
Route::group(['prefix'=>'member','middleware'=>'auth'],function (){
    Route::get('/dashboard',[
        'uses'=>'memberController@getDashboard',
        'as'=>'dashboard'
    ]);
    Route::get('/logout/',[
        'uses'=>'memberController@getLogout',
        'as'=>'logout'
    ]);
});