<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['description', 'type', 'status'];

    // Relationships
    public function ad()
    {
        return $this->belongsTo('App\Models\Ad');
    }
}
