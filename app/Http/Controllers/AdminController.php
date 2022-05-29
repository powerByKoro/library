<?php

namespace App\Http\Controllers;

use App\Models\ReservationBook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function admin_panel_check_user(Request $request){
        $user_name = $request->input('user_name');
        $pasport = $request->input('pasport');
        $pasport = intdiv($pasport,1930);
        $check = DB::table('users')
            ->where('bilet','=', $pasport)
            ->where('name','=',$user_name)
            ->first();
        if($check){
            return Redirect::back()->withErrors(['msg' => 'Пользователь найден', 'name' => $check->name, 'bilet' => 'MAI-2022-'.$check->bilet]);
        }else{
            return Redirect::back()->withErrors(['msg' => 'Пользователь не найден']);
        }
    }

    public function admin_panel_check_reservation(Request $request){

        $user =DB::table('users')
            ->where('bilet', $request->input('bilet'))
            ->first();
        if($user){
            $reservationBooks = ReservationBook::query()
                ->select('books.*', 'reservation_books.id as reservation_books_id')
                ->join('reservations', 'reservations.id', '=', 'reservation_books.reservation_id')
                ->join('books', 'books.id', '=', 'reservation_books.book_id')
                ->where('reservations.user_id', $user->id)
                ->get();

            if($reservationBooks != null){
                return view('reserved_books', compact('reservationBooks'));
            }else{
                return back()->withErrors(['msg' => 'Резервов не найдено']);
            }
        }else{
            return back()->withErrors(['msg' => 'Читательский билет не найден']);
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

        return Redirect::route('admin_dashboard');
    }
}
