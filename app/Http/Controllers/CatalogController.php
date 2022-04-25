<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\ReservationBook;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function home_page(): View
    {

       $books = Book::query()
           ->where('status', '=' , false)
           ->get();

        $books = $books->chunk(10);

        $author = Author::query()
            ->get();
        $authors = $author->chunk(5);

        $categories = Category::query()
            ->get();

        return view('home', ['books'=>$books,'authors'=>$authors,'categories'=>$categories]);
    }


    public function search(Request $request){
        $search = $request->search;

        $books = Book::query()
            ->where('name', 'LIKE',"%$search%")
            ->where('status','=',false)
            ->get();
        return view('search_home',compact('books'));

    }



}
