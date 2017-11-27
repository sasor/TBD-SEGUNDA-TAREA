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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/{rol_id}', 'HomeController@show')->where('rol_id', '[0-9]+');
    Route::get('/login', 'AuthController@index')->name('login.get');
    Route::post('/login', 'AuthController@authenticate')->name('login.post');
    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::get('/admin/usuarios', 'AdminController@usuarios')->name('admin.users');
    Route::get('/admin/usuario', 'AdminController@usuario')->name('admin.user');
    Route::post('/admin/usuario', 'AdminController@store')->name('admin.store');
    Route::get('/admin/roles', 'AdminController@roles')->name('admin.roles');
    Route::get('/admin/role', 'AdminController@role')->name('admin.role');
    Route::post('/admin/role', 'AdminController@store_role')->name('admin.store.rol');
    Route::get('/admin/role/{id}', 'AdminController@show_rol')->name('admin.show.role');
    Route::post('/admin/role/{id}', 'AdminController@update_rol')->name('admin.update.role');

    Route::get('/academico/proyectos', 'AcademicoController@proyectos')->name('academico.proyectos');
    Route::get('/academico/proyecto', 'AcademicoController@proyecto')->name('academico.proyecto');
    Route::post('/academico/proyecto', 'AcademicoController@store_proyecto')->name('academico.store.proyecto');
});
