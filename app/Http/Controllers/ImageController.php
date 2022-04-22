<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
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
        $author_books = Author::query()
            ->where('id','=',$id)
            ->with('books')
            ->get();

        $name = DB::table('authors')
            ->where('id','=',$id)
            ->first();
        return view('author_books', compact('author_books','name'));

    }
    public function authors_page(){
        $authors = DB::table('authors')
            ->get();
        return view('authors_page', compact('authors'));
    }
    public function categories($id){
        $categories = Category::query()
            ->where('id','=',$id)
            ->with('books')
            ->get();

        $name = DB::table('categories')
            ->where('id','=',$id)
            ->first();

        return view('category_page',compact('categories','name'));

    }

    public function bookDescription($id){
        $descriptionId = DB::table('books')
            ->where('id','=', $id)
            ->get();
        return view('book_description',compact('descriptionId'));
    }
}
