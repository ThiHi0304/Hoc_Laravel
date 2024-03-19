<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller

{
    private $users;
    public function __construct() {
        $this->users=new Users();
    }
    public function index()
    {
        // $statement=$this->users->statemenUser("DELETE FROM users");
        // dd($statement);
        $title = 'Danh sách người dùng';
        $this->users->learnQueryBuiler();
        $usersList= $this->users->getAllUsers();
        return view('clients.users.lists', compact('title', 'usersList'));
    }
    public function add(){
        $title='Thêm người dùng';
        return view('clients.users.add', compact('title'));
    }
    public function postAdd(Request $request){
        $request->validate([
           'fullname' => 'required|min:5',
           'email' => 'required|email|unique:users'
        ],[
           'funllname.required' => 'Họ và tên bắt buộc phải nhập',
           'fullname.min' => 'Họ và tên phải từ :min trở lên',
           'email.required' => 'Email bắt buộc phải nhập',
           'email.email' => 'Email không đúng định dạng của email',
           'email.unique' => 'Email đã tồn tại trong hệ thống'
        ]);
        $dataInsert = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->addUser( $dataInsert);
        return redirect()->route('users.index')->with('msg', 'thêm người dùng thành công');
     }


     

     public function getEdit( Request $request, $id = 0)
    {
        $title = "Sửa người dùng";
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            // dd($userDetail[0]);
            if (!empty($userDetail[0])) {
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
                // dd($userDetail[0]);
                // dd($userDetail);
            } else {
                return redirect()->route('users.index')->with('msg', 'Người dùng này không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
        }
        return view('clients.users.edit', compact('title', 'userDetail'));
    }
    public function postEdit(Request $request)
    {
        $id = session('id');
        if(empty($id)){{
            return back()->with('msg', 'Liên kết không tồn tại');
        }}
        $request->validate([
            'fullName' => 'required|min:5',
            'email' => 'required|email|unique:users,email,' . $id

        ], [
            'fullName.required' => 'Họ và tên bắt buộc phải nhập',
            'fullName.min' => 'Họ tên phải từ :min kí tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống'
        ]);
        $dataUpdate = [
            $request->fullName,
            $request->email,
            date('Y-m-d H:i:s')
        ];

        // dd($dataUpdate);
        $this->users->updateUser($dataUpdate, $id);
        return back()->with('msg', 'Cập nhật người dùng thành công');
    }
    public function delete($id){
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            // dd($userDetail[0]);
            if (!empty($userDetail[0])) {
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus) {
                    $msg = 'Xóa người dùng thành công';
                } else {
                    $msg = 'Bạn không thể xóa người dùng này';
                }
                // dd($userDetail[0]);
                // dd($userDetail);
            } else {
                return 'Người dùng này không tồn tại';
            }
        } else {
            return 'Người dùng này không tồn tại';
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }
}    