<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    public function index(Request $request) {
        $id = Auth::user()->role == "admin" ? $request->id : Auth::user()->branch_id;
        $data["branch"] = Branch::findOrFail($id);
        $data["title"] = "فرع " . ($data["branch"]->name ?? "");
        $data["cars"] = Branch::findOrFail($id)->cars ?? [];
        return view("pages.branch" , $data);
    }

    public function addBranch(Request $request){
        $data["title"] = "اضافة فرع";
        return view("pages.add-branch" , $data);
    }

    public function store(Request $request){
        $data = $request->validate([
            "name" => "required|max:50",
        ]);
        $branch = Branch::create($data);
        session()->flash("success" , "تم اضافة فرع بنجاح");
        return redirect()->back();
    }
}

