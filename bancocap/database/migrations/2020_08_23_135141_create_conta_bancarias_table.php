<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_bancarias', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->integer('digito');
            $table->decimal('valor', 8, 2);
            $table->timestamps();

            //
            //  Chave estrangeira
            //
            $table->foreignId('user_id')->constrained();     
            $table->foreignId('agencia_id')->constrained();     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contabancarias');
    }
}
