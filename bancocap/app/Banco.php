<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $guarded = [];

    public function agencias(){
        return $this->hasMany(Agencia::class);
    }
}
