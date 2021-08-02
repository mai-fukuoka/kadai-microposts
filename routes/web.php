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

Route::get('/', 'MicropostsController@index');

//ユーザー登録

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//認証が必要なグループ
Route::group(['middleware'=>['auth']], function () {
    Route::group(['prefix'=>'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        
        //ユーザーがお気に入りに対するグループ
        //ユーザが追加したお気に入りを一覧表示
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::group(['prefix' => 'microposts/{id}'], function () {
        //ユーザが特定の投稿内容をお気に入りに追加する機能
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        //ユーザがお気に入りを削除する機能
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });

    
    //ユーザー一覧
    Route::resource('users', 'UsersController', ['only'=>['index','show']]);
    //投稿機能
    Route::resource('microposts', 'MicropostsController', ['only'=>['store','destroy']]);
});
