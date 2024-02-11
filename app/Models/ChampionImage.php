<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChampionImage extends Model
{
    protected $fillable = ['image_path'];

    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}