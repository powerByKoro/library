<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\ReservationBook;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function home_page(): View
    {
        $book_id_array=[];

        if(Auth::user()){
            $get_reservation_id = DB::table('reservations')->where('user_id',Auth::user()->id)->get();
            $reservation_id =[];
            foreach ($get_reservation_id as $id){
                $reservation_id[] = $id->id;
            }
            foreach ($reservation_id as $id){
                $idd = DB::table('reservation_books')->where('reservation_id',$id)->first();
                if($idd != null){
                    $book_id_array[] = $idd->book_id;
                }
            }
        }

       $books = Book::query()
           ->where('status', '=' , false)
           ->get();

        $books = $books->chunk(10);

        $author = Author::query()
            ->get();
        $authors = $author->chunk(5);

        $categories = Category::query()
            ->get();


        return view('home', ['books'=>$books,'authors'=>$authors,'categories'=>$categories,'book_id_array'=>$book_id_array]);


    }


    public function search(Request $request){
        $search = $request->search;
        $book_id_array=[];
        $get_reservation_id = DB::table('reservations')->where('user_id',Auth::user()->id)->get();
        foreach ($get_reservation_id as $iddd){
            $reservation_id[] = $iddd->id;
        }
        foreach ($reservation_id as $iddd){
            $idd = DB::table('reservation_books')->where('reservation_id',$iddd)->first();
            if($idd != null){
                $book_id_array[] = $idd->book_id;
            }
        }
        $books = Book::query()
            ->where('name', 'LIKE',"%$search%")
            ->where('status','=',false)
            ->get();
        return view('search_home',compact('books','book_id_array'));

    }



}
