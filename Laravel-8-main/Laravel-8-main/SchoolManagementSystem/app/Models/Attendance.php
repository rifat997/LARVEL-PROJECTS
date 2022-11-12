<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resort;
use App\Models\Student;

class Attendance extends Model
{
    use HasFactory;
    public $timestamps = false;
    // public function resort(){
    //     return $this->belongsTo(Resort::class);
    // }

    public function student(){
        return $this->belongsTo(Student::class);
    }

}
