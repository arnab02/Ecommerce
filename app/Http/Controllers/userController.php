<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    //
    function login(Request $req){
       // return $req->input();
      $user= User::where(['email'=>$req->email])->first();
      if(!$user||!Hash::check($req->password,$user->password)){
          return 'username pw not matched';
      }else{
          $req->session()->put('user',$user);
         return redirect('/');
      }
    }
}
