<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ["chassisNum" , "carNum" , "deviceId" , "carModel" , "carType" , "branchId"];

    public function branch()
    {
        return $this->belongsTo(Branch::class , "branchId");
    }
}
