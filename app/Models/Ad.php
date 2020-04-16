<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ad extends Model
{
    protected $fillable = ['title', 'description', 'price', 'status', 'latitude', 'longitude'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($ad) {
            foreach ($ad->images as $image) {
                Storage::disk('images')->delete($image->url);
            }
        });
    }

    // Relationships
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    // Reverse relationships
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }
}
