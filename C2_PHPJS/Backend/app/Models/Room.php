<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;

    public function sessions() {
        return $this->hasMany(Session::class);
    }
}
