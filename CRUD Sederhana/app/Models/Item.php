<?php

namespace App\Models;
//Model ini berada dalam namespace App\Models, sesuai struktur Laravel.

use Illuminate\Database\Eloquent\Factories\HasFactory;
//Memungkinkan penggunaan factory untuk membuat data dummy dalam database saat testing.
use Illuminate\Database\Eloquent\Model;
//Kelas ini mewarisi Eloquent Model, sehingga dapat berinteraksi dengan database menggunakan ORM (Object-Relational Mapping).

class Item extends Model
    //Item adalah model yang mewakili tabel items dalam database.
{
    use HasFactory;
    //Digunakan untuk membuat factory data dengan php artisan make:factory ItemFactory.
    protected $fillable = [
        'name',
        'description',
    ];
    //$fillable menentukan kolom yang boleh diisi secara mass assignment
}