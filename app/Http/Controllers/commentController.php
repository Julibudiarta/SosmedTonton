<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function comment(Request $request){
        $postId = $request->input('post_id');
        $userId = Auth::id();
        $commentData =$request->input('addComment');
        if($commentData == ''){
            return response()->json(['error_Comment' => 'Comment field is required.']);
        }else{
            $comment = new Comment;
            $comment->comment = $commentData;
            $comment->user_id = $userId;
            $comment->post_id = $postId;
            $comment->save();
    
            return response()->json(['success_Comment' => 'Post Comment successfully.',
                                        'post_id' => $postId]);
        }

    }
}
