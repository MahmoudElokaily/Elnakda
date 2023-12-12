<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        $data["title"] = "تسجيل الدخول";
        if (Auth::check()){
            return to_route("home");
        }
        return view("pages.login" , $data);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "username" => "required|string|max:30",
            "password" => "required",
        ]);
        $user = User::where("username" , $request->username)->first();
        if ($user && Auth::attempt($credentials)){
            session()->flash('success', "اهلا" . $user->name ?? "");
           return $user->role == "admin" ? to_route("home") : to_route("branch");
        }
        session()->flash('error', "خطا في الاسم او الرقم السري");
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        session()->flash('success', "تم تسجيل الخروج");
        return to_route("login");
    }
}
