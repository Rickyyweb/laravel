<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    /**
     * Enable Table Timestamps
     *
     * @var bool
     */
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function usercad(){
        return $this->belongsTo(User::class, 'user_cad');
    }
    public function telefones(){
        return $this->hasMany(Telefone::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
