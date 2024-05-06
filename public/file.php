<?php
    use Illuminate\Support\Facades\DB;

    $id_Post = $_POST['post_id'];
    $id_User = $_POST['user_id'];
    
    DB::table('post_likes')->insert([
        'user_id' => $id_User,
        'post_id' => $id_Post,
    ]);
