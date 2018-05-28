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

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ログインしているか確認するルーティング
Route::group(['middleware' => ['auth']], function(){
   Route::resource('users', 'UsersController', ['only' =>['index', 'show']]);
   //以下のグループは、URIに users/{id} を接続する
   Route::group(['prefix' => 'users/{id}'], function(){
      //フォロールーティング
      Route::post('follow', 'UserFollowController@store')->name('user.follow');
      Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
      Route::get('followings', 'UsersController@followings')->name('users.followings');
      Route::get('followers', 'UsersController@followers')->name('users.followers');
      
      //--ここからお気に入り機能のルーティング--
      
      //お気に入りを実行したお気に入りコントローラのお気に入りインスタンスの生成
      Route::post('favorite', 'UserFavoriteController@store')->name('user.favorite');
      //お気に入りを解除実行したお気に入りコントローラのお気に入りインスタンスの削除
      Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('user.unfavorite');
      //Userがお気に入りしているポスト一覧を表示するコントローラ
      Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
   });
   Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
});