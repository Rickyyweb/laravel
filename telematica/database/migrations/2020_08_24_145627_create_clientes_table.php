<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;


class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const UPDATED_AT = 'user_last_edit';

    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->softDeletes('deleted_at', 0);
            $table->string('nome')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable()->nullable();
            $table->string('dt_nascimento')->nullable();
            $table->string('local_nascimento')->nullable();
            $table->timestamps();
            
            $table->foreignId('user_cad')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('estado_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
