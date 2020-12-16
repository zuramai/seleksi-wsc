<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $timestamps = false;
    public function room() {
        return $this->belongsTo(Room::class);
    }
}
