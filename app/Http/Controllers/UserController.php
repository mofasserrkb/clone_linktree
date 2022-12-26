<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//have to use user model
class UserController extends Controller
{
    //
    public function edit()
    {
         return view('users.edit',[
           'user'=> Auth::user()
         ]);
    }
    public function update(Request $request){

      //  dd($request);
        $request->validate([
            'background_color'=>'required|size:7|starts_with:#',
            'text_color'=>'required|size:7|starts_with:#'
        ]);
    Auth::user()->update($request->only(['background_color','text_color']));
     return redirect()->back()->with(['success'=>'Changes saved successfully!']);
    }

    public function show(User $user){
        //return $user;
      $link= Link::where('user_id',$user->id)->get();
        return view('users.show',[

            'user'=>$user,
            'links'=> $link
        ]);

    }
}
