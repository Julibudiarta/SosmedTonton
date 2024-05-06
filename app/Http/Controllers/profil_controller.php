<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class profil_controller extends Controller
{
    public function profil(){
        $user_id = Auth::id();

        $data = DB::table('post')
            ->join('users', 'post.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->sum('post.like');
        $count_post = DB::table('post')
            ->join('users', 'post.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->count();
        return view('dasboard/profil', compact('data', 'count_post'));
        
    }
    public function edit_profil(Request $request){
        $request->validate([
            'pp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Simpan gambar
        
        $user = Auth::User();
        $user_id = $user->id;
        $imageName = time().'.'.$request->pp->extension();
        $request->pp->move(public_path('images'), $imageName); 


        // Simpan path gambar ke dalam database
        $foto ='images/' . $imageName;
        $image= User::find($user_id);
        $image->foto=$foto;
        $image->save();

        // Tampilkan pesan sukses atau lakukan tindakan lainnya
        return redirect()->back()->withInput();
    }
}
