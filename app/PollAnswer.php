<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model
{
    protected $table = 'poll_answers';
    protected $fillable = ['course_id', 'answer', 'user_id'];
}
