<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = 'polls';

    protected $fillable = [
        'course_id', 'user_id', 'options', 'question'
    ];
}
