<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function admin_panel(Request $request){
        $user = $request->all();

        $admin = DB::table('users')
                    ->where('email','=', 'admin@library.lib')
                    ->first();

        if(($user['login'] == $admin->email) and ($user['password'] == $admin->password)){
            return view('admin_panel');
        }else{
            return back();
        }
    }

    public function admin_panel_check_user(Request $request){
        $user_name = $request->input('user_name');
        $pasport = $request->input('pasport');
        $pasport = intdiv($pasport,1930);
        $check = DB::table('users')
            ->where('bilet','=', $pasport)
            ->where('name','=',$user_name)
            ->first();
        if($check){
            return view('check_user', compact($check));
        }else{
            dd('not okay');
        }
    }
}
