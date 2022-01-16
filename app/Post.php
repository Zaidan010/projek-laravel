<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
    'title', 'content', 'thumbnail',
  ];

  protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->comments()->delete();
        });
    }

  public function user()
  {
      return $this->belongsTo('App\User');
  }
  
  
  public function comments()
      {
          return $this->hasMany(Comment::class);
      }

}
