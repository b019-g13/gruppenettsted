<?php

namespace App;

use Storage;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'size_width', 'size_height', 'size_name', 'attr_alt', 'user_id',
    ];

    protected $appends = [
        'url_full'
    ];

    public function getUrlFullAttribute()
    {
        return Storage::url($this->url);;
    }
}
