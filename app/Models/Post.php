<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'image_path', 'status_id'];

    // Define the custom attribute
    public function getIsPrivateAttribute()
    {
        return $this->status->name === PostStatus::STATUS_PRIVATE;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function status()
    {
        return $this->belongsTo(PostStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
