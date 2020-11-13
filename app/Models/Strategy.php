<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strategy extends Model {

    protected $fillable = [
        'type',
        'tenure',
        'yield',
        'relief',
    ];

    public function investments() {

        return $this->hasMany('App\Models\Investment', 'strategy_id');
    }
}
