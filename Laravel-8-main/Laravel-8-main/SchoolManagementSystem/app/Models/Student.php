<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;

class Student extends Model
{
    use HasFactory;
    public function attendance(){
         return $this->hasMany(Attendance::class, student_id);
    }
}
