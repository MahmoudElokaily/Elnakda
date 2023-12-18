<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Malfunction extends Model
{
    use HasFactory;
    protected $fillable = ["deviceId" , "description" , "branchId" , "serialNum"];

    public function branch()
    {
        return $this->belongsTo(Branch::class , "branchId");
    }
}
