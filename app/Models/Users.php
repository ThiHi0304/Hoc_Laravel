<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users'; 
    public function getAllUsers(){
        $users = DB::select('SELECT * FROM users ORDER BY create_at DESC');
        return $users;
    }
    public function addUser($data){
        Db::insert('INSERT INTO users (fullname,email,create_at) value (?,?,?)',$data);
    }
    public function getDetail($id){
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }
    public function updateUser($data,$id){
        $data = array_merge($data,[$id]);
        // $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET fullname =?,email =?, update_at= ? where id=?', $data);
    }
    public function deleteUser($id){
        return DB::delete("DELETE FROM $this->table WHERE  id=? ",[$id]);
    }
    public function statemenUser($sql){
        return DB::statement($sql);

    }
    public function learnQueryBuiler(){
        // lấy tất cả bản ghi của table
        $id=20;
       $lists = DB::table($this->table)
       ->select('fullname','email','id','update_at')
        // ->where('id',2)
        // ->where(function($query) use ($id){
        //     $query->where('id', '<',$id)->orWhere('id','>',$id);
        //     $query->orWhere('id','>',$id);
        // })
    //    ->where('fullname','like','%Xuan ca%')
    //    ->whereBetween('id',[1,4])
        // ->whereNotIn('id',[7,9])
        ->whereNotNull('update_at')
        // ->whereIn('id',[7,9])
        ->get();
        $sql = DB::getQueryLog();
        dd($sql);
       
       // Lấy 1 bản ghi đầu tiên của table lấy thông tin chi tiết
       $detail = DB::table($this->table)->first();
 
     }
}
