<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    public function index(Request $request) {
        $data["title"] = "اضافة جهاز";
        $data["BranchId"] = $request->branch;
        return view("pages.add-device" , $data);
    }

    public function store(Request $request){
        $data = $request->validate([
            "chassisNum" => "required",
            "carNum" => "required",
            "deviceId" => "required",
            "carModel" => "required",
            "carType" => "required"
        ]);
        $data["branchId"] = $request->has("branchId") ? $request->branchId : Auth::user()->branch_id;
        $car = Car::create($data);
        session()->flash('success', "تم تسجيل الجهاز بنجاح");
        return redirect()->back();
    }

    public function delete($id) {
        $device = Car::destroy($id);
        session()->flash('success', "تم حذف الجهاز بنجاح");
        return redirect()->back();
    }

    public function all() {
        $data["title"] = "جميع الاجهزة";
        $data["cars"] = Car::all() ?? [];
        return view("pages.devices-report" , $data);
    }
}
