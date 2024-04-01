<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Quy ước tên table
    /*
    Tên model:Post=> table:posts
    Tên model: Productcategories :product_categories
     */
    protected $table='posts';
    //Quy ước khóa chính mặc định Laravel sẽ lấy field id làm khóa chính
    protected $primaryKey='id';

    // public $incrementing=false; 

    // protected $keyType='string';
    public $timestamps = true;
    const CREATED_AT='create_at';
    const UPDATED_AT='update_at';
    protected $attibutes=[
        'status'=>0
    ];
}
