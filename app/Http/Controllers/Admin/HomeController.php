<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {
        $data["title"] = "الرئسية";
        $data["branches"] = Branch::all() ?? [];
        return view("pages.home" , $data);
    }
    public function register() {
        $data["title"] = "اضافة مستخدم جديد";
        $data["branches"] = Branch::all() ?? [];
        return view("pages.add-user" , $data);
    }

    public function store(Request $request) {
        $data = $request->validate([
            "name" => "required|string|min:3|max:50",
            'username' => 'required|string|min:3|max:255|unique:users|regex:/^\S*$/u',
            'password' => "required",
            'role'      => "required",
            'branch_id'      => "required",
        ]);
        $data['password'] = Hash::make($request->password);
        User::create($data);
        session()->flash("success" , "تم تسجيل مستخدم جديد بنجاح");
        return to_route("home");
    }
}
