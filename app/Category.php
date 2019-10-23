<?php

namespace App;
use App\Course;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = ['name','course_id','user_id'];

     public function post()
     {
     	return $this->hasMany(Post::class);
     }
     public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
