<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ["name" , "branchCap"];

    public function user()
    {
        return $this->belongsTo(User::class , "branch_id");
    }
    public function cars()
    {
        return $this->hasMany(Car::class,'branchId');
    }
    public function Malfunctions()
    {
        return $this->hasMany(Malfunction::class,'branchId');
    }
}
