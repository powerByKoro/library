<?php

namespace App\Http\Controllers;

use App\Mail\SendReservationInformation;
use App\Models\Reservation;
use App\Models\ReservationBook;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add(Request $request, $id): RedirectResponse
    {

        /* @var $currentUser User */
        $currentUser = $request->user();

        $reservation = new Reservation;
        $reservation->user_id = $currentUser->id;
        $reservation->save();

        DB::table('reservation_books')
            ->insert([
                'reservation_id' => $reservation->id,
                'book_id' => $id
            ]);

        DB::table('books')
            ->where('id',$id)
            ->update(['status'=>true]);

        $currentBook = DB::table('books')
            ->where('id',$id)
            ->get();

        Mail::to($currentUser['email'])->send(new SendReservationInformation($currentBook));

        return Redirect::route('home');
    }

    public function delete($id): RedirectResponse
    {


        DB::table('reservation_books')
            ->where('book_id', '=', $id)
            ->delete();

        DB::table('books')
            ->where('id',$id)
            ->update(['status'=>false]);

        return Redirect::route('account');
    }
}
