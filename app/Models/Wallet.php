<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model {

    use HasFactory;

    protected $fillable = ['balance', 'user_id'];

    public function user() {

        return $this->belongsTo('App\Models\User');
    }
}
