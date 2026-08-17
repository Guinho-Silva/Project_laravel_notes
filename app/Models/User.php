<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function notes(){

        // Verfica se a relação é de muitos para muitos
        return $this->hasMany(Note::class);
    }
}
