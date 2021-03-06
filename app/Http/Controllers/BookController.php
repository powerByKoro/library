<?php

namespace App\Http\Controllers;

use App\Mail\SendReservationInformation;
use App\Models\Reservation;
use App\Models\ReservationBook;
use App\Models\User;
use DateInterval;
use DateTimeZone;
use Faker\Provider\DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->bilet != null){
            /* @var $currentUser User */
            $currentUser = $request->user();
            $reservation = new Reservation;
            $reservation->user_id = $currentUser->id;
            $reservation->save();

            $date_return = date_add($reservation->created_at,date_interval_create_from_date_string('2 days'));

            DB::table('reservation_books')
                ->insert([
                    'reservation_id' => $reservation->id,
                    'book_id' => $id
                ]);

            $counter = DB::table('books')->where('id', $id)->first();
            $counter = $counter->count;
            $counter -=1;

            DB::table('books')
                ->where('id',$id)
                ->update([
                    'count' => $counter,
                    'created_at'=>$reservation->created_at,
                    'date_return'=>$date_return
                ]);

            $currentBook = DB::table('books')
                ->where('id',$id)
                ->get();

            Mail::to($currentUser['email'])->send(new SendReservationInformation($currentBook));

            return Redirect::route('home');
        }else{
            return Redirect::route('home')->withErrors(['msg' => 'У вас нет читательского билета!']);
        }

    }

    public function delete($id): RedirectResponse
    {
        DB::table('reservation_books')
            ->where('book_id', '=', $id)
            ->delete();

        $counter = DB::table('books')->where('id', $id)->first();
        $counter = $counter->count;
        $counter +=1;

        DB::table('books')
            ->where('id',$id)
            ->update([
                'count'=>$counter,
                'created_at'=>null,
                'date_return'=>null
                ]);

        return Redirect::route('account');
    }


}
