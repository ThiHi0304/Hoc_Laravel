<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function post(Request $request){
       dd($request->all());
    }
}
