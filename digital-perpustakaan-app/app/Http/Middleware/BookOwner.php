<?php

namespace App\Http\Middleware;

use App\Models\books;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BookOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $book = books::findOrFail($request->route('id'));

        if($book && ($book->user_id == Auth()->id() || Auth::user()->usertype != 'user' )) 
        {
            return $next($request);
        }
        return redirect()->route('dashboard')->with('error', 'Unauthorized Access');
    }
}
