<?php

namespace App;
use App\Course;
use App\User;
use Illuminate\Database\Eloquent\Model;

class courseApproval extends Model
{
    protected $fillable = [
      'user_id','course_id','status','course_user_id'
    ];
    public function course()
    {
    	return $this->belongsTo(Course::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
