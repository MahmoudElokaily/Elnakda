<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ["chassisNum" , "carNum" , "deviceId"  , "carType" , "branchId" , "serialNum" , "motorNum"];

    public function branch()
    {
        return $this->belongsTo(Branch::class , "branchId");
    }
}
