<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $token = $request->session()->has('token');
        if($token == true){
            return redirect('/dashboard');
        }else{
            return view('home');
        }
        
    }




}
