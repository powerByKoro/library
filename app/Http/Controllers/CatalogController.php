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
    public function index(): View
    {
        $reservationBooks = ReservationBook::all();

        $excludedBookIds = [];

        foreach ($reservationBooks as $reservationBook) {
            if (!in_array($reservationBook->book_id, $excludedBookIds)) {
                $excludedBookIds[] = $reservationBook->book_id;
            }
        }

        $books = Book::query()
            ->whereNotIn('id', $excludedBookIds)
            ->get();

        $authors = Author::query()
            ->get();

        $categories = Category::query()
            ->get();
        return view('home', compact('books','authors','categories'));
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
