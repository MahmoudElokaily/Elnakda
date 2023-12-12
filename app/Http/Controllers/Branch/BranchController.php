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
        $data["title"] = "فرع " . (Auth::user()->branch->name ?? "");
        $data["cars"] = Branch::findOrFail($id)->cars ?? [];
        $data["branch"] = Branch::findOrFail($id);
        return view("pages.branch" , $data);
    }
}

