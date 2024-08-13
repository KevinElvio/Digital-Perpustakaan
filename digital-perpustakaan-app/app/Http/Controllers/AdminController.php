<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Exports\BooksExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    
    public function index()
    {
        $book = books::Paginate(10);
        return view('admin.dashboard', compact('book'));
    }

    public function export(Request $request)
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }
    
}

