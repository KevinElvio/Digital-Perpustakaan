<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $book = books::Paginate(20);
        return view('dashboard', compact('book'));
    }
}
