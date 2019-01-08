<?php

namespace App;

use Log;
use Auth;
use Storage;
use ImageEditor;

use Illuminate\Database\Eloquent\Model;

use App\Image;
use App\PostType;

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

    public function image()
    {
        return $this->belongsTo('App\Image')->withDefault(function ($image) {
            $image->url = 'public/placeholder-wide.png';
            $image->attr_alt = 'Header bilde';
        });
    }

    public function updateImage($uploaded_file)
    {
        if ($uploaded_file === null) {
            return false;
        }

        $user = Auth::user();

        try {
            // Don't process files that are too large (25mb)...
            // This acts as a fallback. We should validate before sending it to this method
            $image_size_mb = $uploaded_file->getSize() / (1000*1000);
            if ($image_size_mb > 25) {
                return false;
            }

            // Create image
            $image = new Image;
            $image->size_name = 'full';
            $image->user_id = $user->id;
            $image->attr_alt = $this->title . ' header';
            $image->url = 'public/' . str_random(20) . '.jpg';

            // Resize image
            $edited_image = ImageEditor::make( $uploaded_file );
            // $edited_image->fit(1920, 1080, function ($constraint) {
            //     $constraint->upsize();
            // });
            $edited_image->orientate();

            // Upload image, convert it to jpg, and compress it slightly
            Storage::put($image->url, $edited_image->stream('jpg', 90)->__toString());

            // Set image sizes
            $image->size_width = $edited_image->width();
            $image->size_height = $edited_image->height();
            $image->save();

            // Update the post image
            $this->image_id = $image->id;
            $this->save();

            return true;
        } catch (\Intervention\Image\Exception\NotReadableException $e) {
            Log::error('NotReadableException');
            Log::error($uploaded_file);
            Log::error($e);
        } catch (Exception $e) {
            Log::error($e);
        }

        return false;
    }

}
