<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    //
    public function index(){
        // $allProducts=Post::all();
        // dd($allProducts);
        // $post=Post::find('c1');
        // dd($post);
        // $post=new Post;
        // $post->title='Bài viết 3';
        // $post->content='Nội dung 3';
        // $post->status=1;
        // $post->save();
        echo '<h2>Query Eloquent Model</h2>';
        $allPost=Post::all();
        // dd($allPost);
        // if($allPost->count()>0){
        //     foreach($allPost as $item){
        //         echo $item->title.'<br/>';
        //     }
        // }
        // $detail=Post::find(1);
        // dd($detail);
        // $activePosts=DB::table('posts')->where('status',1)->get();
        // $activePosts=Post::where('status',1)->orderBy('id','DESC')->get();
        // if($activePosts->count()>0){
        //     foreach($activePosts as $item){
        //         echo $item->title.'<br/>';
        //     }
        // }
        // dd($activePosts);
        // $allPosts=Post::all();
        // $activePosts=$allPost->reject(function($post){
        //     // dd($post);
        //     return $post->status==0;
        // });
        // dd($activePosts);
        // Post::chunk(2,function ($post){
        //     foreach($post as $post){
        //     echo $post->title.'<br/>';
        //     }
        //     echo 'Kết thúc'.'<br/>';
        // });
        //  $allPosts=Post::where('status',1)->cursor();
        //  dd($allPost);
        $allPosts=Post::cursor();
        foreach($allPosts as $item){
               echo $item->title.'<br/>';
               }
        dd($allPosts);
    }

}
