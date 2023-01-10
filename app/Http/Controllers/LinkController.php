<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    //
    public function index(){
       // $links=Auth::user()->links()->withCount('visits')->get();
       //here 'visits' is visit relationship which creates new attribute in our data
        $links= Link::where('user_id', Auth::id())->withCount('visits')->with('latest_visit')->get();
       // dd($links);
      // return $links;
        return view('links.index',['links'=>$links]);
    }
    public function create(){

        return view('links.create');

    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'link'=>'required|url'
        ]);

      //  dd($request);
        $link= Link::create([
            'user_id'=>Auth::id(),
            'name'=>$request->input('name'),
            'link'=>$request->input('link')

        ]);

        if($link)

        {

            return redirect()->route('index');
        }
        return redirect()->back();
    }
    public function edit(Link $link){
     if($link->user_id !== Auth::id())
     {
        return abort(404);
     }
     return view('links.edit',[
        'link'=>$link
     ]);
    }
    public function update(Request $request,Link $link){

        if($link->user_id !== Auth::id())
     {
        return abort(403);
     }
     $request->validate([
        'name'=>'required|max:255',
        'link'=>'required|url'
    ]);

    $link->update($request->only(['name','link']));

    return redirect()->route('index');

    }
    public function destroy(Request $request,Link $link){
        if($link->user_id !== Auth::id())
        {
           return abort(403);
        }
        $link->delete();
        return redirect()->route('index');
    }
}
