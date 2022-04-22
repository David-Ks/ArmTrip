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

use App\Http\Controllers\MainController;

Route::get('/', "MainController@index")->name('home');
Route::get('/tours', "MainController@tours")->name('tours');
Route::get('/tours/{id}', "MainController@tour")->name('tour.view');
Route::get('/saper', "MainController@saper")->name('saper');

Route::middleware(['auth'])->group(function() {
    Route::post('/buy/{ticket}', "MainController@ticketBuy")->name('buy');
    Route::get('/tickets', "MainController@ticketsMy")->name('tickets.my');
});

Route::prefix('review.')->group(function () {
    Route::get('/reviews', "MainController@review")->name('view');
    Route::post('/addreview', "MainController@addReview")->name('add');
    Route::post('/delreview', "MainController@delReview")->name('del');
});

Route::post('/message', 'MainController@message')->name('message.send');
Route::get('/balance', "MainController@balance")->name('balance');
Route::get('/admin', "AdminController@panel")->name('admin');
Route::post('/admin/question/checked', "AdminController@questCheck")->name('question.checked');

Route::prefix('panel.')->group(function () {
    Route::get('/admin/user', "AdminController@user")->name('user');
    Route::get('/admin/ticket', "AdminController@ticket")->name('ticket');
    Route::get('/admin/gid', "AdminController@gid")->name('gid');
    Route::get('/admin/question', "AdminController@question")->name('ques');
}

Route::prefix('user.')->group(function () {
    Route::post('/admin/user/newimg', "AdminController@userImg")->name('newimg');
    Route::post('/admin/user/delete', "AdminController@userDelete")->name('delete');
}

Route::prefix('ticket.')->group(function () {
    Route::post('/admin/ticket/create', "AdminController@ticketCreate")->name('create');
    Route::post('/admin/ticket/change', "AdminController@ticketChange")->name('change');
    Route::post('/admin/ticket/delete', "AdminController@ticketDelete")->name('delete');
}

Route::prefix('gid.')->group(function () {
    Route::post('/admin/gid/add', "AdminController@gidAdd")->name('add');
    Route::post('/admin/gid/delete', "AdminController@gidDelete")->name('delete');
}

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout') -> name('logout');


Route::get('/home', function() {
    return redirect()->route('home');
});