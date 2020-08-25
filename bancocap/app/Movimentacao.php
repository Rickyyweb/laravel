<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movimentacoes';

    protected $guarded = [];


    public function ContaBancarias(){

        return $this->belongsTo(ContaBancaria::class);
    }
}
