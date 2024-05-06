<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class RegisterControler extends Controller
{
    //request data
    public function register(Request $request){
        $Username= $request->input('name');
        $Email= $request->input('email');
        $Password= $request->input('password');
        $validatePasword= $request->input('passwordSecond');
        $level ='user';
        $user = User::where('name', $Username)->first();
        $user_email=User::where('email', $Email)->first();

        if($user){
            return redirect()->back()->withErrors(['username_error'=>'Username sudah digunakan']);
        }elseif(strlen($Username)<1 || strlen($Email)<1 || strlen($Password)<1){
            return redirect()->back()->withErrors(['kosong'=>'Form Kosong, isi Form dengan benar']);
        }elseif($user_email){
            return redirect()->back()->withErrors(['email_error'=>'E-mail sudah digunakan']);
        }
        elseif($Password==$validatePasword){

            $user = new User;
            $user->name = $Username;
            $user->email = $Email;
            $user->password = BCRYPT($Password);
            $user->level = $level;
            $user->save();

            return redirect()->action('App\Http\Controllers\LoginController@index');
             
        }else{
            return redirect()->back()->withErrors(['password_salah'=> 'Password anda tidak sama']);
        }
    }
    public function login(){
        return view('../index');
    }
}
