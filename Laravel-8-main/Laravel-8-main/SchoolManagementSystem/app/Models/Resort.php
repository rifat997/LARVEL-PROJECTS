<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;

class Resort extends Model
{
    use HasFactory;
    public $timestamps = false;
    // public function attendance(){
    //     return $this->belongsTo(Attendance::class, student_id);
    // }
    // public function attendance(){
    //     return $this->hasMany(Attendance::class, resort_id);
    // }
}
