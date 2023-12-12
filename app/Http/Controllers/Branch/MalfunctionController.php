<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Car;
use App\Models\Malfunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MalfunctionController extends Controller
{
    public function index(Request $request) {
        $id = Auth::user()->role == "admin" ? $request->id : Auth::user()->branch_id;
        $data["title"] = "اعطال فرع  " . (Auth::user()->branch->name ?? "");
        $data["malfunctions"] = Branch::findOrFail($id)->malfunctions ?? [];
        return view("pages.malfunction" , $data);
    }

    public function addMalfunction() {
        $data["title"] = "اضافة عطل";
        return view("pages.add-malfunction" , $data);
    }

    public function showMalfunction(Request $request) {
        $id = $request->id;
        $data["title"] = "عرض عطل";
        $data["malfunction"] = Malfunction::findOrFail($id);
        return view("pages.show-malfunction" , $data);
    }

    public function store(Request $request){
        $data = $request->validate([
            "deviceId" => "required",
        ]);
        $data["description"] = $request->des;
        $data["branchId"] = Auth::user()->branch_id;
        $data["capName"] = Auth::user()->name;
        $malfunction = Malfunction::create($data);
        session()->flash('success', "تم تسجيل العطل بنجاح");
        return redirect()->back();
    }

    public function delete($id) {
        $malfunction= Malfunction::destroy($id);
        session()->flash('success', "تم حذف العطل بنجاح");
        return redirect()->back();
    }
    public function all() {
        $data["title"] = "جميع الاعطال";
        $data["malfunctions"] = Malfunction::all() ?? [];
        return view("pages.malfunctions-report" , $data);
    }
}
