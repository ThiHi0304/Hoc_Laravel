<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;   
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\DB;
// use DB;
use App\Rules\Uppercase;
class HomeController extends Controller
{
    public $data= [];
    public function index(){
        $this->data['title']='Đào tạo lập trình web';
        $this->data['message']='Đăng kí tài khoản thành công';
        // return view('clients.home',$this->data);
        // $user=DB::select('SELECT *FROM users WHERE id>?',[1]);
        $user=DB::select('SELECT *FROM users WHERE email=:email',[
            'email'=>'hoangan@gmail.com'
        ]);

        dd($user);
        return "Hello";
    }
    public function products(){
        $this->data['title']='Sản phẩm';
        return view('clients.products',$this->data);
    }
    public function getAdd(){
        $this->data['title']='Thêm sản phẩm';
        $this->data['errorMesage']='Vui lòng kiểm tra lại dữu liệu';

        return view('clients.add',$this->data);
    }
    public function postAdd(ProductRequest $request)
    {
        $rules = [
            'product_name' => ['required', 'min:6'],
            'product_price' => ['required', 'integer']
        ];
        // $message = [
        //     'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
        //     'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
        //     'product_price.required' => 'giá sản phẩm bắt buộc phải nhập',
        //     'product_name.integer' => 'Giá sản phẩm phải là số'
        // ];
        $message = [
            'required' => ':attribute bắt buộc phải nhập',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'integer' => ':attribute phải là số',
            //'uppercase' =>'Trường :attribute phải viết hoa'
        ];
        $attribute = [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
        ];
        // $validator =  Validator::make($request->all(), $rules, $message, $attribute);
        // $validator->validate();
       // $request->validate($rules,$message);

        return response()->json(['status'=>'success']);

        // $validator->validate();
        // if ($validator->fails()) {
        //     $validator->errors()->add('msg', 'Vui lòng kiểm tra dữ liệu');
        //     //return 'Thất bại';
        // } else {
        //     // return 'Thành công';
        //     return redirect()->route('product')->with('msg', 'Validate thành công');
        // };

        // return back()->withErrors($validator);
        // $request->validate($rules,$message);
        // Xử lý việc thêm dữ liệu vào database
    }
    public function putAdd(Request $request){
        return "Phương thức put";
        dd($request);
    }
    // public function isUppercase($value,$message,$fail){
    //     if($value!=mb_strtoupper($value,'UTF-8')){
    //         $fail($message);
    //     }
    // }
    public function getArr(){
        $contentArr=[
            'name'=>'Học lập trình',
            'age'=>'Học lập trình',
            'acdemy'=>'Học lập trình'
        ];
        return $contentArr;
    }
    public function downloadImage(Request $request){
        if(!empty($request->image)){
            $image=trim($request->image);
            $fileName='image_'.uniqid().'.jpg';
            // $fileName=basename($image);
            // return response()->streamDownload(function() use ($image){
            //     $imageContent=file_get_contents($image);
            //     echo $imageContent;
            // },$fileName);
            return response()->download($image,$fileName);
        }
    }
    public function downloadDoc(Request $request){
        if(!empty($request->file)){
            $file=trim($request->file);
            $fileName='tai-lieu_'.uniqid().'.jpg';
            // $fileName=basename($image);
            // return response()->streamDownload(function() use ($image){
            //     $imageContent=file_get_contents($image);
            //     echo $imageContent;
            // },$fileName);
            $header=[
                'Content-Type'=>'application/jpg'
            ];
            return response()->download($file,$fileName,$header);
        }
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

