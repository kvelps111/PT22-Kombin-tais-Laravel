<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostStatus extends Model
{
    protected $fillable = ['name'];

    const STATUS_PUBLIC = 'public';
    const STATUS_PRIVATE = 'private';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
