<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url'];

    // Relationships
    public function ad()
    {
        return $this->belongsTo('App\Models\Ad');
    }
}
