<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    public function llibres() {
        return $this->belongsToMany(Llibre::class);
    }
}
