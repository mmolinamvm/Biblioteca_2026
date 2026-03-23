<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Llibre extends Model
{
    public function autors() {
        return $this->belongsToMany(Autor::class);
    }
}
