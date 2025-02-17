<?php

use Illuminate\Support\Facades\Route;
//Mengimpor facade Route untuk mendefinisikan rute di Laravel.
use App\Http\Controllers\ItemController;
//Mengimpor ItemController, yang digunakan untuk menangani permintaan terkait item.
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

Route::get('/', function () {
    return view('welcome');
});
//Menyediakan rute GET untuk URL / yang akan menampilkan tampilan (view) welcome.blade.php.

Route::resource('items', ItemController::class);
//Secara otomatis membuat semua rute CRUD untuk items dengan menggunakan ItemController.