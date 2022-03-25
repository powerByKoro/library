<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Reservation::findOrFail($basket_id)->products;
            return view('account', compact('products'));
        } else {
            abort(404);
        }
    }

    public function add(Request $request, $id): RedirectResponse
    {
        /* @var $currentUser User */
        $currentUser = $request->user();

        $reservation = new Reservation;
        $reservation->user_id = $currentUser->id;
        $reservation->save();

        $reservation->books()->attach($id);

        return back()->with([
            'message' => 'Книга успешно добавлена!'
        ]);
    }
}
