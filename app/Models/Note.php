<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function user(){

        // Relaciona com o modelo de user
        return $this->belongsTo(User::class);
    }
}
