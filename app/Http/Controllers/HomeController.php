<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\ReservationBook;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $reservationBooks = ReservationBook::query()
            ->select('books.*', 'reservation_books.id as reservation_books_id')
            ->join('reservations', 'reservations.id', '=', 'reservation_books.reservation_id')
            ->join('books', 'books.id', '=', 'reservation_books.book_id')
            ->where('reservations.user_id', Auth::id())
            ->get();

        return view('account', compact('reservationBooks'));
    }

}
