<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\UsersController;

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
//Bài 1:
// Route::post('/post', [FormController::class, 'post']);
// Route::get('/', function (){
//     return view('FormLogin');
//  });
//Bài 2:
// Route::get('/', function (){
//     return view('formUpload');
//  });
// Route::post('/',[FormController::class,'upload'])->name('form');

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/san-pham',[HomeController::class,'products'])->name('product');
Route::get('/them-san-pham',[HomeController::class,'getAdd']);
Route::post('/them-san-pham',[HomeController::class,'postAdd'])->name('post-add');
Route::put('/them-san-pham',[HomeController::class,'putAdd']);
Route::get('/demo-response', function(){
    $contentArr=[
        'name'=>'Học lập trình',
        'age'=>'Học lập trình',
        'acdemy'=>'Học lập trình'
    ];
    return $contentArr;
});

Route::get('download-image',[HomeController::class,'downloadImage'])->name('download-image');
Route::get('download-doc',[HomeController::class,'downloadDoc'])->name('download-doc');

// Route::get('/lay-thong-tin',[HomeController::class,'getArr']);
// Route::get('demo-response-2', function(Request $request){
//     return $request->cookie('unicode');
// });
// Route::get('demo-response', function(){
//     $contentArr=['name'=>'Unicode','version'=>'laravel 8','lesson'=>'HTTP Response Laravel'];
//     return response()->json($contentArr)->header('Api-Key','123');
// });
Route::get('demo-response', function(){
    echo old('username');
    return view('clients.demo-test');
})->name('demo-response');
Route::post('demo-response', function(Request $request){
    if(!empty($request->username)){
    //return redirect('demo-response');
        return back()->withInput()->with('mess','Validate thành công');
    }
    return redirect(route('demo-response'))->with('mess','Validate không thành công');
});

// Route::get('/',function(){
//     return view('forms');
// });

//DANH SÁCH NGƯỜI DÙNG
Route::prefix('users')->name('users.')->group(function(){
    Route::get('/',[UsersController::class,'index'])->name('index');
    Route::get('add',[UsersController::class,'add'])->name('add');
    Route::post('/add',[UsersController::class,'postAdd'])->name('post-add');
    Route::get('/edit/{id}',[UsersController::class,'getEdit'])->name('edit');
    Route::post('/update',[UsersController::class,'postEdit'])->name('post-edit');
    Route::get('/delete/{id}',[UsersController::class,'delete'])->name('delete');
});
Route::prefix('posts')->name('posts.')->group(function(){
    Route::get('/',[PostController::class,'index'])->name('index');
});