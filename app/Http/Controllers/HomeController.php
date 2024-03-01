<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $data= [];
    public function index(){
        $this->data['title']='Đào tạo lập trình web';
        $this->data['message']='Đăng kí tài khoản thành công';
        return view('clients.home',$this->data);
    }
    public function products(){
        $this->data['title']='Sản phẩm';
        return view('clients.products',$this->data);
    }
    public function getAdd(){
        $this->data['title']='Thêm sản phẩm';
        return view('clients.add',$this->data);
    }
    public function postAdd(Request $request){
        dd($request);
    }
    public function putAdd(Request $request){
        return "Phương thức put";
        dd($request);
    }
    }
    // public function getNew(){
    //     return 'Danh sách tin tức ';
    // }
    // public function getCategories($id){
    //     return 'Chuyên mục: '.$id;
    // }
    // public function getProductDetail($id){
    //     return view('clients.products.detail',compact(('id')));
    // }

