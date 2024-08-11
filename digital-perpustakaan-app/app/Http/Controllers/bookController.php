<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function Book()
    {
        $book = books::get();
        return view('add-book', compact('book'));
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


}
