<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function wallet() {

        return $this->hasOne('App\Models\Wallet');
    }

    public function investments() {

        return $this->morphMany('App\Models\Investment', 'user');
    }
}
