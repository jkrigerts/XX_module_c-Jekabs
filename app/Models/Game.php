<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
    public function gameversion() {
        return $this->hasMany(GameVersion::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
