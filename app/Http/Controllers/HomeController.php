<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $data= [];
    public function index(){
        $this->data['welcome']='Học lập trình Laravel tại <b>Unicode</b>';
        $this->data['content']='<h3>Chương 1: Nhập môn Laravel </h3>
        <p>Kiến thức 1</p>
        <p>Kiến thức 2</p>
        <p>Kiến thức 3</p>';
        $this->data['index']=1;
        // $this->data['dataArr']=[
        //     'Item 1',
        //     'Item 1',
        //     'Item 1'
        // ];
        $this->data['dataArr']=[];
        $this->data['messege']='Đặt hàng thành công';
        $this->data['number']=9;
        return view('home',$this->data);
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
