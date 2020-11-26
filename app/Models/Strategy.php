<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategy extends Model {

    use HasFactory;

    protected $fillable = [
        'type',
        'tenure',
        'yield',
        'relief',
    ];

    protected $casts = [

        'tenure' => 'integer',
        'yield'  => 'float',
        'relief' => 'float',
    ];

    public function investments() {

        return $this->hasMany('App\Models\Investment', 'strategy_id');
    }
}
