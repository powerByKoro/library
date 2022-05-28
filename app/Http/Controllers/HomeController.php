<?php

namespace App\Http\Controllers;

use App\Mail\SendPasswordAfterRegistration;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\ReservationBook;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\BookController;
use App\Mail\SendBiletAfterRegistration;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $cur_date = date('Y-m-d H:i:s');

        DB::table('reservation_books')
            ->join('reservations', 'reservations.id', '=', 'reservation_books.reservation_id')
            ->join('books', 'books.id', '=', 'reservation_books.book_id')
            ->where('books.date_return','<',$cur_date)
            ->delete();

        DB::table('books')
            ->where('books.date_return','<',$cur_date)
            ->update([
                'count'=>DB::raw('count+1'),
                'created_at'=>null,
                'date_return'=>null
            ]);

        $reservationBooks = ReservationBook::query()
            ->select('books.*', 'reservation_books.id as reservation_books_id')
            ->join('reservations', 'reservations.id', '=', 'reservation_books.reservation_id')
            ->join('books', 'books.id', '=', 'reservation_books.book_id')
            ->where('reservations.user_id', Auth::id())
            ->get();
        return view('account', compact('reservationBooks'));
    }

    public function get_bilet(Request $req){
        $bilet = $req->input('pasport');
        $bilet = intdiv($bilet,1930);
        Mail::to(Auth::user()->email)->send(new SendBiletAfterRegistration($bilet));

        DB::table('users')
            ->where('id',Auth::id())
            ->update(['bilet'=>$bilet]);

        return Redirect::back();
    }

    public function admin_panel(){
        return view('admin_panel');
    }
}
