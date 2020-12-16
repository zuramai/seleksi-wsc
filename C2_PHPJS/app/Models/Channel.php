<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public $timestamps = false;
    
    public function sessions() {
        return $this->hasManyThrough(Session::class, Room::class);
    }
    public function rooms() {
        return $this->hasMany(Room::class);
    }
}
