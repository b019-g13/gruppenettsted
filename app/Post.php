<?php

namespace App;

use App\PostType;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'content', 'user_id', 'image_id'
    ];

    public function post_type()
    {
        return $this->belongsTo('App\PostType');
    }

    public function requiresAuth()
    {
        $post_type = PostType::where('slug', 'private')->firstOrFail();
        return ($this->post_type->slug === $post_type->slug);
    }
}
