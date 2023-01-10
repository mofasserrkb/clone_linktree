<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Visit;
use Illuminate\Http\Request;
//have to use link and visit model
class VisitController extends Controller
{
    //

    public function store(Request $request,Link $link){

        //I can code like this below code.
    //  return   Visit::create([
    //         'link_id'=>$link->id,
    //         'user_agent'=>$request->userAgent()
    //       ]);
         /*
          but I have already getting link object due to model
          binding in the method parameters so I can just use
          that link object and chain on the visit's relationship
          then create method which will automatically associate with
          links id
          */
        return $link->visits()->create([
            'user_agent'=>$request->userAgent()
        ]);
    }
}
