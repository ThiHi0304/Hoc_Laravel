<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
// use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Client router
// Route::get('/',[HomeController::class],'index');
// Route::get('/admin/products',function(Request $request){
//     return "Path: ".$request->path();
// });
// Route::get('/',function(Request $request){
//     return "<h3> Path: </h3>".$request->fullUrlWithQuery(['name'=>'VuThanh']);
// });

// Route::get('/admin/post',function(Request $request){
//     if($request->is('admin/*')){
//         return 'Request matches with admin pattern';
//     }
// });
// Route::get('/',function(Request $request){
//     echo "Curent method Http: ".$request->method().'<br>';
//     if($request->isMethod('get')){
//         echo 'This is GET mehtod';
//     }
// });
// Route::get('userIp',function(Request $request){
//     return "<h1>"."Địa chỉ ip của người dùng: ".$request->ip()."</h1>";
// });

// Route::post('/post', [FormController::class, 'post']);
// Route::get('/', function (){
//    return view('form');

// });


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/san-pham',[HomeController::class,'products']);
// Route::middleware('auth.admin')->prefix('categories')->group(function(){
//     //Danh sách chuyên mục
//     Route::get('/',[CategoriesController::class,'index'])->name('categories.list');

//     //Lấy chi tiết 1 chuyên mục (Aps dụng show form sửa chuyên mục)
//     Route::get('/edit/{id}',[CategoriesController::class,'getCategory'])->name('categories.edit');
    
//     //Xử lí update chuyên mục
//     Route::post('/edit/{id}',[CategoriesController::class,'updateCategory']);

//     //Hiển thị form add dữ liệu
//     Route::get('/add',[CategoriesController::class,'addCategory'])->name('categories.add');

//     //Xử lí thêm chuyên mục
//     Route::post('/add',[CategoriesController::class,'handleAddCategory']);

//     //Xóa chuyên mục
//     Route::delete('/delete/{id}',[CategoriesController::class,'deleteCategory'])->name('categories.delete');
// });
// // Hiển thị form upload
// Route::get('/upload',[CategoriesController::class,'getFile']);
// // Xử lí file
// Route::post('/upload',[CategoriesController::class,'handleFile'])->name('categories.upload');


// Route::get('san-pham/{id}',[HomeController::class,'getProductDetail']);
// //Admin route
// Route::middleware('auth.admin')->prefix('admin')->group(function(){
//     Route::get('/',[AdminDashboardController::class,'index']);
//     Route::resource('products',ProductsController::class)->middleware('auth.admin.product');

// });


