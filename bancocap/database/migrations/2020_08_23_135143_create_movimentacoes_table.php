<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('tipo_operacao')->nullable();
            $table->decimal('valor', 8, 2)->nullable();
            $table->timestamps();

            //
            //  Chave estrangeira
            //
            $table->foreignId('conta_bancaria_id')->constrained();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacoes');
    }
}
