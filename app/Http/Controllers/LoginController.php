<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use app\models\post;

class LoginController extends Controller
{
    public function index(){
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            }elseif ($user->level == 'user') {
                return redirect()->intended('user');
            }
         } return view('index');
    }
    public function proses_login(Request $request){
        request()->validate(
            [
                'name' => 'required',
                'password' => 'required',
            ]
        );
        $kredensil = $request->only('name', 'password');
        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if($user -> level =='admin'){
                return redirect()->intended('admin');
            }elseif ($user->level == 'user'){
                return redirect()->intended('user');
                
            }
            return redirect()->intended('index');
        }return redirect()->back()->withInput($request->only('name'))->withErrors(['login_gagal' => 'login gagal silahkan cobalagi']);
    }
    public function logout(){
        Auth::logout();
        return view('../index'); ;
    }
}
