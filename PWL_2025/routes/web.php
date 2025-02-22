<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeCOntroller;
// use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/hello', function () {
//     return 'Hello World';
// });

Route::get('/hello', [WelcomeCOntroller::class, 'hello']);

Route::get('/world', function () {
    return 'World';
});

// Route::get('/', function () {
//     return 'Selamat Datang';
// });
Route::get('/', [HomeController::class, 'index']);

// Route::get('/about', function () {
//     return 'NIM : 2341720235 <br>Nama : Innama Maesa Putri';
// });
Route::get('/about', [AboutController::class, 'about']);

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
}); //Jika parameter tidak diisi maka akan muncul 404 error

// Route::get('/articles/{id}', function ($id) {
//     return 'Halaman artikel dengan ID ' . $id;
// });
Route::get('/articles/{id}', [ArticleController::class, 'articles']);

Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
}); // Optional parameter menambahkan satu nilai default jika parameter tidak diisi,
// sehingga jika membuka halaman tanpa parameter akan menampilkan nilai default yang telah ditetapkan
// namun jika parameter diisi, yang ditampilkan adalah parameter yang telah diisi (bukan nilai default)

Route::resource('photos', PhotoController::class); //menggenerate fungsi crud di Photo controller

Route::resource('photos', PhotoController::class)->only([
    'index',
    'show'
]);
Route::resource('photos', PhotoController::class)->except([
    'create',
    'store',
    'update',
    'destroy'
]); //mengubah route pada photo