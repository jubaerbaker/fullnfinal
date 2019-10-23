<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [ 'user_id','post_id','content' ];
    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
      return $this->belongsTo(Post::class);
    }
}
