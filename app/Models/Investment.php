<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model {

    use HasFactory;

    public function strategy() {

        return $this->morphTo();
    }

    public function user() {

        return $this->morphTo();
    }
}
