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
        return view('blog.hello', ['name' => 'Innam']);
    }

}
