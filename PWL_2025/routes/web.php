<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/', function () {
    return 'Selamat Datang';
});

Route::get('/about', function () {
    return 'NIM : 2341720235 <br>Nama : Innama Maesa Putri';
});

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
}); //Jika parameter tidak diisi maka akan muncul 404 error

Route::get('/articles/{id}', function ($id) {
    return 'Halaman artikel dengan ID ' . $id;
});

Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
}); // Optional parameter menambahkan satu nilai default jika parameter tidak diisi,
// sehingga jika membuka halaman tanpa parameter akan menampilkan nilai default yang telah ditetapkan
// namun jika parameter diisi, yang ditampilkan adalah parameter yang telah diisi (bukan nilai default)