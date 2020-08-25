<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    // protected $fillable = [
    //     'numero',
    //     'digito',
    //     'nome'
    // ];
    protected $guarded = [];

    public function banco(){
        return $this->belongsTo(Banco::class);
    }

    public function contabancarias(){
        return $this->hasMany(ContaBancaria::class);
    }
}
