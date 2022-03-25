<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
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
        $currentUser = $request->user();

        if (empty($basket_id)) {
            // если корзина еще не существует — создаем объект
            $basket = Reservation::create();
            // получаем идентификатор, чтобы записать в cookie
            $basket_id = $basket->id;
        } else {
            // корзина уже существует, получаем объект корзины
            $basket = Reservation::findOrFail($basket_id);
            // обновляем поле `updated_at` таблицы `baskets`
            $basket->touch();
        }
        $basket->products()->attach($id);
        // выполняем редирект обратно на страницу, где была нажата кнопка «В корзину»
        return back()->withCookie(cookie('basket_id', $basket_id, 525600));
    }
}
