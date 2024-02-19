<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return 'Home';
    }
    //
    public function getNew(){
        return 'Danh sách tin tức ';
    }
    public function getCategories($id){
        return 'Chuyên mục: '.$id;
    }
}
