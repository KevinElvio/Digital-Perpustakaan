<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bookController extends Controller
{
    public function Book()
    {
        
        return view('add-book');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required | max:255 | string',
            'description' => 'required | max:255 | string',
            'category_id' => 'required | exists:categories,id',
            'quantity' => 'required | max:255 | integer',
            'file' => 'required|mimes:pdf|max:2048',
            'cover' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->has('cover') && $request->has('file')) {
            $cover = $request->file('cover');
            $file = $request->file('file');

            $img = $cover->getClientOriginalExtension();
            $pdf = $file->getClientOriginalExtension();

            $nameimg = time() . '.' . $img;
            $namepdf = time() . '.' . $pdf;

            $pathimg = 'uploads/img/';
            $pathpdf = 'uploads/pdf/';

            $cover->move($pathimg, $nameimg);
            $file->move($pathpdf, $namepdf);
        }

        books::create([
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'file' => $pathpdf . $namepdf,
            'cover' => $pathimg . $nameimg,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect('book')->with('status', 'Book Created');
    }

    public function edit(int $id)
    {
        $books = books::findOrFail($id);
        if($books->user_id != auth()->id() && auth()->user()->usertype != 'admin' )
        {
            return redirect()->route('dashboard')->with('error', 'Unauthorized Access');
        }
        return view('edit-book', compact('books'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required | max:255 | string',
            'description' => 'required | max:255 | string',
            'category_id' => 'required | exists:categories,id',
            'quantity' => 'required | max:255 | integer',
            'file' => 'required|mimes:pdf|max:2048',
            'cover' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->has('cover') && $request->has('file')) {
            $cover = $request->file('cover');
            $file = $request->file('file');

            $img = $cover->getClientOriginalExtension();
            $pdf = $file->getClientOriginalExtension();

            $nameimg = time() . '.' . $img;
            $namepdf = time() . '.' . $pdf;

            $pathimg = 'uploads/img/';
            $pathpdf = 'uploads/pdf/';

            $cover->move($pathimg, $nameimg);
            $file->move($pathpdf, $namepdf);
        }

        books::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'file' => $pathpdf . $namepdf,
            'cover' => $pathimg . $nameimg,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect('dashboard')->with('status', 'Book Update');
    }

    public function delete( int $id)
    {
        $books = books::findOrFail($id);
        $books->delete();

        return redirect()->back()->with('status', 'Book Delete');
    }

}
