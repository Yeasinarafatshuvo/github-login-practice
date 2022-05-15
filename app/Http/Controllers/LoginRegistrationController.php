<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class LoginRegistrationController extends Controller
{
    public function logOut(Request $request)
    {
        $request->Session()->flush();
        return redirect('/');
    }
    public function callGithubAuth()
    {
        $callGithubLoginService =  Socialite::driver('github')->redirect();
        return $callGithubLoginService;
    }

    public function GithubCallBack()
    {
        $user = Socialite::driver('github')->stateless()->user();

        $token = $user->token;
        $userId = $user->getId();
        $nickName = $user->getNickname();
        $name = $user->getName();
        $email = $user->getEmail();
        $img = $user->getAvatar();

        Session::put('token',$token);
        Session::put('user_id',$userId);
        Session::put('name',  $name);
        Session::put('email',   $email);
        Session::put('nickName',   $nickName);
        $countValue = DB::table('users')->where('email', $email)->get()->count();

        if($countValue == 0){
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'user_id' => $userId,
                'nick_name' => $nickName,
            ]);
            return redirect('/dashboard');
        }else{
            return redirect('/dashboard');
        }



    }

}
