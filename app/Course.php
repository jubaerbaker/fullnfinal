<?php

namespace App;
use App\Category;
use App\courseApproval;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
      'name', 'description','schedule','user_id'
    ];
    public function category()
     {
     	return $this->hasMany(Category::class);
     }
     public function courseapproval()
     {
     	return $this->hasMany(courseApproval::class);
     }
}
