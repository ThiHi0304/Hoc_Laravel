<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
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
// Route::get('unicode',function(){
//     $html='<h1>Học lập trình tại unicode</h1>';
//     return $html;
// });
// Route::get('unicode', function () {
//     return view('form');
// });
// Route::get('unicode', function () {
//     return 'Phương thức get của patch của unicode';
// });
// Route::post('/unicode', function () {
//     return'Phương thức post của path/unicode';
// });
// Route::delete('unicode',function(){
//     return 'Phương thức DELETE của path/unicode';
// });
// Route::patch('unicode',function(){
//     return 'Phương thức patch của path/unicode';
// });
// Route::match(['get','post'],'unicode',function(){
//     return $_SERVER['REQUEST_METHOD'];
// });
// Route::any('unicode',function(Request $request){
//     return $request->method();
// });
// Route::get('show-form',function(){
//     return view('form');
// });
// Route::redirect('unicode','show-form', 404);
// Route::view('show-form','form');
Route::get('/','App\Http\Controllers\HomeController@index')->name('home');
Route::get('/tin-tuc','HomeController@getNew')->name('new');
Route::get('chuyen-muc/{id}',[HomeController::class,'getCategories']);

Route::prefix('admin')->group(function(){
    Route::get('tin-tuc/{id?}/{slug?}.html', function ($id=null, $slug=null) {
        $content= 'Phương thức get của patch của unicode có tham số: ';
        $content.=' id='.$id .'<br/>';
        $content.=' slug='.$slug;
        return $content;
    })->where('id','\d+')->where('slug','.+')->name('admin.tintuc');


    Route::get('show-form',function(){
        return view('form');
    })->name('admin.show-form');
    Route::prefix('products')->middleware('CheckPermission')->group(function(){
        Route::get('/',function(){
            return 'Danh sách sản phẩm';
        });
        Route::get('add',function(){
            return 'Thêm sản phẩm';
        });
        Route::get('edit',function(){
            return 'Sửa sản phẩm';
        });
        Route::get('delete',function(){
            return 'Xóa sản phẩm';
        });
    });
});
