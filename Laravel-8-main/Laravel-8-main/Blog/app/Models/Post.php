<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Author;

class Post extends Model
{
    use HasFactory;
    public function post(){
        return $this->belongsTo(Author::class);
    }
    
}
