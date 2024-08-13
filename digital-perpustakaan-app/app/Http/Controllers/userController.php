<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $book = books::Paginate(8);
        return view('dashboard', compact('book'));
    }
}
