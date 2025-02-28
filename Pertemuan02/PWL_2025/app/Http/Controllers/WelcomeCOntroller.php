<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeCOntroller extends Controller
{
    public function hello()
    {
        return 'Hello World';
    }

    public function greeting()
    {
        return view('blog.hello')
            ->with('name', 'Andi')
            ->with('occupation', 'Astronaut');
    } //Sebagai alternatif untuk meneruskan array data lengkap ke fungsi view helper, kita dapat menggunakan
//metode with untuk menambahkan bagian data individual ke view. 

}
