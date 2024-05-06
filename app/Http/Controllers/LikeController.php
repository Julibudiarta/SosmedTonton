<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\post_likes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    
    public function likePost(Request $request)
    {
        $postId = $request->input('post_id');
        $userId = Auth::id();

        $userCheck = post_likes::where('post_id', $postId)
                               ->where('user_id', $userId)
                               ->first();
        if($userCheck){
            $userCheck->delete();
            return response()->json(['error' => 'Post liked successfully.',
            'post_id' => $postId]);
        }else{
            DB::table('post_likes')->insert([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
            return response()->json(['success' => 'Post liked successfully.',
                                    'post_id' => $postId]);
        }
    }
}

