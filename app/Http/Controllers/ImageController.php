<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class ImageController extends Controller
{
    public function upload_img(Request $request, $id){
        $path = $request->file('image')->store('uploads','public');
        DB::table('users')
            ->where('id','=',$id)
            ->update(['img' => $path]);
        return back();
    }

    public function authors($id){
        $book_id_array=[];
        if(Auth::user()){
            $get_reservation_id = DB::table('reservations')->where('user_id',Auth::user()->id)->get();
            $reservation_id =[];
            foreach ($get_reservation_id as $iddd){
                $reservation_id[] = $iddd->id;
            }
            foreach ($reservation_id as $iddd){
                $idd = DB::table('reservation_books')->where('reservation_id',$iddd)->first();
                if($idd != null){
                    $book_id_array[] = $idd->book_id;
                }
            }
        }
        $author_books = Author::query()
            ->where('id','=',$id)
            ->with('books')
            ->get();

        $name = DB::table('authors')
            ->where('id','=',$id)
            ->first();
        return view('author_books', compact('author_books','name','book_id_array'));

    }
    public function authors_page(){
        $authors = DB::table('authors')
            ->get();
        return view('authors_page', compact('authors'));
    }
    public function categories_page(){
        $categories = DB::table('categories')
            ->get();
        return view('categories_page', compact('categories'));
    }
    public function categories($id){
        $book_id_array=[];
        if(Auth::user()){
            $get_reservation_id = DB::table('reservations')->where('user_id',Auth::user()->id)->get();
            $reservation_id =[];
            foreach ($get_reservation_id as $iddd){
                $reservation_id[] = $iddd->id;
            }
            foreach ($reservation_id as $iddd){
                $idd = DB::table('reservation_books')->where('reservation_id',$iddd)->first();
                if($idd != null){
                    $book_id_array[] = $idd->book_id;
                }
            }
        }
        $category_books = Category::query()
            ->where('id','=',$id)
            ->with('books')
            ->get();

        $name = DB::table('categories')
            ->where('id','=',$id)
            ->first();

        return view('category_books',compact('category_books','name','book_id_array'));

    }

    public function bookDescription($id){
        $book_id_array=[];
        if(Auth::user()){
            $get_reservation_id = DB::table('reservations')->where('user_id',Auth::user()->id)->get();
            $reservation_id =[];
            foreach ($get_reservation_id as $iddd){
                $reservation_id[] = $iddd->id;
            }
            foreach ($reservation_id as $iddd){
                $idd = DB::table('reservation_books')->where('reservation_id',$iddd)->first();
                if($idd != null){
                    $book_id_array[] = $idd->book_id;
                }
            }
        }
        $descriptionId = DB::table('books')
            ->where('id','=', $id)
            ->get();

        $descriptionId_2 = DB::table('books')
            ->where('id','=', $id)
            ->first();

        $authorId = $descriptionId_2->author_id;

        $authorName = DB::table('authors')
            ->where('id','=',$authorId)
            ->first();

        return view('book_description',['descriptionId'=>$descriptionId,'authorName'=>$authorName, 'book_id_array'=>$book_id_array]);
    }
}
