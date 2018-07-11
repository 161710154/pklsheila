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
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'admin', 'middleware'=>['auth', 'role:admin']],
function()	{
Route::resource('pengguna','PenggunaController');
Route::resource('kategori','KategoriController');
Route::resource('artikel','ArtikelController');
Route::resource('komentar','KomentarController');

});


Route::get('blog','FrontendController@blog');
Route::get('blog/{id}', array('as' => 'singleblog', 'uses' =>'FrontendController@singleblog'));

