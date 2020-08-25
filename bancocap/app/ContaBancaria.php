<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaBancaria extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function agencia(){
        return $this->belongsTo(Agencia::class);
    }

    public function movimentacoes(){
        return $this->hasMany(Movimentacao::class);
    }
}
