<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        $book = books::Paginate(10);
        return view('admin.dashboard', compact('book'));
    }
    
}

