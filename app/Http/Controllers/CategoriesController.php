<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
        
    }
    //Hiển thị danh sách chuyên mục phương thức GET
    public function index(){
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
    public function addCategory(){
        return view('clients/categories/add');

    }
    //Thêm dữ liệu vào chuyên mục (Phương thức POST)
    public function handleAddCategory(){
        return redirect(route('categories.add'));
       // return 'Submit thêm chuyên mục';
    }
    //Xóa dữ liệu Delete phương thức DELETE
    public function deleteCategory($id){
        return 'Submit xóa chuyên mục'.$id;
    }
}
