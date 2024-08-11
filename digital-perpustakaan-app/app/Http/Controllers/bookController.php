<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bookController extends Controller
{
    public function Book(){
        return view('add-book');
    }

    
}
