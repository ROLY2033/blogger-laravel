<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    // relacion mucho a mucho
    public function posts(){
        return $this->belongsToMany(Post::class , 'imageable');
    }
}