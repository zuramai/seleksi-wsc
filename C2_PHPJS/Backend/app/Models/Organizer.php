<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organizer extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
        'password_hash'
    ];

    public function username() {
        return 'email';
    }

    public function getAuthPassword() {
        return $this->password_hash;
    }
}
