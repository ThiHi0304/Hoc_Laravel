<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;   
use Illuminate\Support\Facades\Validator; 
use App\Rules\Uppercase;
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
        $this->data['errorMesage']='Vui lòng kiểm tra lại dữu liệu';

        return view('clients.add',$this->data);
    }
    public function postAdd(Request $request){
        // dd($request->all());
        $attributes=[
            'product_name'=>'Tên sản phẩm',
            'product_price'=>'Giá sản phẩm'
        ];
        $rule=[
            'product_name'=>['required','min:6',new Uppercase],
            'product_price'=>['required','integer',new Uppercase]
        ];
        $message=[
            'required'=>':attribute bắt buộc phải nhập',
            'min'=>':attribute không đưuọc nhỏ hơn :min kí tự',
            'integer'=>':attribute phải là số',
            // 'uppercase'=>':attribute phải viết hoa'
        ];
        // $message=[
        //     'product_name.required'=>'Trường :attribute bắt buộc phải nhập',
        //     'product_name.min'=>'Sản phẩm không đưuọc nhỏ hơn :min kí tự',
        //     'product_price.required'=>'Gía sản phẩm bắt buộc phải nhập',
        //     'product_price.integer'=>'Gía sản phẩm phải là con số'
        // ];
        $validator=Validator::make($request->all(),$rule,$message,$attributes);
        // $validator->validate();
        if($validator->fails()){
            $validator->errors()->add('msg','Vui lòng kiểm tra lại dữ liệu');
            // return 'Validate thất bại';
        }else{
            // return 'Validate thành công';
            return redirect()->route('product')->with('msg','Validate thành công');
        }
        return back()->withErrors($validator);

        // $request->validate($rule,$message);
    }
    public function putAdd(Request $request){
        return "Phương thức put";
        dd($request);
    }
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

