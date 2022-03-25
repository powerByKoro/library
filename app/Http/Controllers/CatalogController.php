<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ReservationBook;
use Illuminate\Contracts\View\View;

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

        return view('home', compact('books'));
    }
}
