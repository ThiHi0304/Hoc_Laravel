<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(Request $request)
    {
        //Nếu là danh sách chuyên mục thì hiển thị ra dòng chữ "Xin chào Unicode"
        if($request->is('categories')){
            echo '<h3>Xin chào Unicode</h3>';
        }
    }
    //Hiển thị danh sách chuyên mục phương thức GET
    public function index(Request $request){
        // if(isset($_GET['id'])){
        //     echo $_GET['id'];
        // }
        //$allData=   $request->all();
        // echo $allData['id'];
        // echo $request->all()['name'];
        // dd($allData);
        // $path =$request->path();
        // echo $path;
        // $url=$request->url();
        // echo $url;
        // $fullUrl=$request->fullUrl();
        // echo $fullUrl;
        // $method=$$request->method();
        // echo $method;
            // $ip=$request->ip();
            // echo $ip;
        // $server=$request->server();
        // dd($server['REQUEST_URI']);
        // $header=$request->header('user_agent');
        // dd($header);
        // $id=$request->input('id');
        // echo $id;
        // $id=$request->input('id.*.name');
        // $id=$request->id;
        // $name=$request->name;
        // dd($name);
        // dd($request)->id;
        // $id=$request('id');
        // dd($id);
        $name=$request('name','Unicode');
        dd($name);
        return view('clients/categories/list');
    }
    //Lấy ra 1 chuyên mục trong id(Phương thức GET)
    public function getCategory($id){
        return view('clients/categories/edit');

    }
    //Cập nhật 1 chuyên mục(Phương thức POST)
    public function updateCategory($id){
        return 'Submit sửa chuyên mục'.$id;
    }
    //Show form thêm dữ liệu
    public function addCategory(Request $request){
        $path =$request->path();
        echo $path;
        return view('clients/categories/add');

    }
    //Thêm dữ liệu vào chuyên mục (Phương thức POST)
    public function handleAddCategory(Request $request){
        // $allData=   $request->all();
        // dd($allData);
        if($request->isMethod('POST')){
            echo 'Phương thức POST';
        }
        //print_r ($_POST);
        //return redirect(route('categories.add'));
       // return 'Submit thêm chuyên mục';
    }
    //Xóa dữ liệu Delete phương thức DELETE
    public function deleteCategory($id){
        return 'Submit xóa chuyên mục'.$id;
    }
}
