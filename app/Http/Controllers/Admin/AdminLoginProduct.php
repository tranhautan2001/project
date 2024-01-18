<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
class AdminLoginProduct extends Controller
{
    
    public function login()
    {
        return view('admin.logins.login');
    }

  
    public function postLogin(Request $request)
    {   
        $email = $request->email;
        $password = $request->password; 
        $remember = $request->has('remember');
       
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember))
         {
            $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
            // Truy vấn để lấy thông tin về quyền từ bảng user_role
            $userRole = DB::table('users')->where('id', $user->id)->value('role');
            if ($remember && $userRole === 'admin') 
            {   // kiểm tra trong remember_token có dữ liệu không 
                return redirect()->route('admin')->withCookie(cookie('email', $email, 525600));   // có thì phiên đăng nhập kéo dài 1 năm
            }  if($userRole === 'admin')
            {
                return redirect()->route('admin'); // ngược lại thì phiên đăng nhập hết hạn trong vòng 1 phút
            }
         }
        return redirect()->back()->withInput()->with('error', 'Đăng nhập thất bại');  
    }
    public function logout(Request $request)
    {
        $user = Auth::user();
        if($user){
            $user->remember_token = null;
            $user->save();
        }
        Auth::logout();
        return redirect()->route('loginAdmin');
    }

  

}
