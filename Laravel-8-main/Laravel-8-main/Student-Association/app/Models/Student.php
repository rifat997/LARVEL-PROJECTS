<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Department;
use App\Models\Course;

class Student extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'course_id',
        'department_id',
        'image'
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function course(){
        return $this->hasMany(Course::class);
    }

    public function phone(){
        return $this->hasOne('App\Models\Phone');
    }
}
