<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post; // Pastikan Anda menggunakan "Post" (bukan "post") sesuai dengan konvensi penamaan Laravel
use Illuminate\Support\Facades\Redirect;
class PostController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi request
        $request->validate([
            'img_post' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah 'image' menjadi 'img_post'
            'caption' =>'required',
        ]);

        // Simpan gambar
        $user = Auth::User();
        $user_id = $user->id;
        $imageName = time().'.'.$request->img_post->extension(); // Ubah 'image' menjadi 'img_post'
        $request->img_post->move(public_path('images'), $imageName); // Ubah 'image' menjadi 'img_post'

        // Simpan path gambar ke dalam database
        $image = new post; // Ubah 'post' menjadi 'Post'
        $image->gambar = 'images/' . $imageName;
        $image->caption = $request->input('caption');
        $image->tanggal = now()->toDateString();
        $image->like = 0;
        $image->comment = 0;
        $image->user_id = $user_id;
        $image->save();

        // Tampilkan pesan sukses atau lakukan tindakan lainnya
        return redirect()->back()->withInput();

    }

    
}

