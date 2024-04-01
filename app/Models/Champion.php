<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    protected $fillable = ['name', 'id_custom', 'description', 'lore'];

    public function images()
    {
        return $this->hasMany(ChampionImage::class);
    }
}
