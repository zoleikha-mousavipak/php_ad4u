<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['title', 'description', 'price', 'status', 'latitude', 'longitude'];

    // Relationships
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    // Reverse relationships
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
