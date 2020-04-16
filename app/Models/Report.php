<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['description', 'status', 'type'];

    // Relationships
    public function ad()
    {
        return $this->belongsTo('App\Models\Ad');
    }
}
