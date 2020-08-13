<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacoesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'transacoes';

    /**
     * Run the migrations.
     * @table transacoes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('usuario_pagante_id');
            $table->unsignedInteger('usuario_recebedor_id');
            $table->unsignedTinyInteger('status_id')->nullable();

            $table->index(["usuario_pagante_id"], 'fk_transacoes_usuarios1_idx');

            $table->index(["status_id"], 'fk_transacoes_transacoes_status1_idx');


            $table->foreign('usuario_pagante_id', 'fk_transacoes_usuarios1_idx')
                ->references('id')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('status_id', 'fk_transacoes_transacoes_status1_idx')
                ->references('id')->on('transacoes_status')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacoes');
    }
}
