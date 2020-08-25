<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    /**
     * Enable Table Timestamps
     *
     * @var bool
     */
    public $timestamps = true;
    
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }    
}
