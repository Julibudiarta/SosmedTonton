<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index(){
        $postingan = DB::table('post')
                ->join('users', 'users.id', '=', 'post.user_id')
                ->select('users.name','users.foto','post.gambar','post.comment','post.caption','post.tanggal','post.id',)
                ->get();
        $userLikes = DB::table('post_likes')
                ->select('user_id','post_id')
                ->get();
        $comt = DB::table('commentdata')
        ->join('users', 'users.id', '=', 'commentdata.user_id')
        ->join('post', 'post.id', '=', 'commentdata.post_id')
        ->select('users.name','users.foto','post.tanggal','commentdata.comment','commentdata.tanggal');
        return view('dasboard.index',['postingan' => $postingan,
                                    'userLikes' => $userLikes,
                                'comt' => $comt]);
    }
}
