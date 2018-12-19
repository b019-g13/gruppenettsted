<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
