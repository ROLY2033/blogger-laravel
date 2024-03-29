<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = [];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // relacion uno a muchos inversa

    public function user(){
        return $this->belongsTo(User::class);
    }
    //uno a muchos
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // relacion mucho a mucho
    public function tags(){
        return $this->belongsToMany(Tag::class);

    }
     // relacion polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comment(){
        return $this->morphOne(Comment::class , 'commentable');
    }
}
