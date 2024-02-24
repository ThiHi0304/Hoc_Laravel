<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index(){
        $title='Học lập trình tại Unicode';
        $content='Nội dung học lập trình';
        /* 
            [
            'title'=>$title,
            'cotent'=>$content
            ];
            compact('title','content')
        */
        //return View::make('home')->with(['title'=>$title,'content'=>$content]);
        return view('home')->with(['title'=>$title,'content'=>$content]);
        // $contentView=view('home');
        // $contentView=$contentView->render();
        // dd($contentView);
        // return $contentView;
    }
    //
    public function getNew(){
        return 'Danh sách tin tức ';
    }
    public function getCategories($id){
        return 'Chuyên mục: '.$id;
    }
    public function getProductDetail($id){
        return view('clients.products.detail',compact(('id')));
    }
}
