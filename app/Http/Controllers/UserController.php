<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
//have to use user model
class UserController extends Controller
{
    //
    public function edit()
    {

    }
    public function update(Request $request){

    }

    public function show(User $user){
        return $user;
    }
}
