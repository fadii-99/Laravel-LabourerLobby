<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPass;
class SignupController extends Controller
{
    public function CreateAccount(Request $req){
    $user = new UserPass();

    $user->email = $req->email;
    $user->user_name = $req->user_name;
    $user->password = $req->password;
    $user->type = $req->type;

    $user->save();

    return view('Main/index');
    }
}
