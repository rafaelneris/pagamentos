<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosSaldoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'usuarios_saldo';

    /**
     * Run the migrations.
     * @table usuarios_saldo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('usuario_id');
            $table->double('saldo')->nullable();

            $table->index(["usuario_id"], 'fk_usuarios_saldo_usuarios_idx');


            $table->foreign('usuario_id', 'fk_usuarios_saldo_usuarios_idx')
                ->references('id')->on('usuarios')
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
        Schema::dropIfExists('usuarios_saldo');
    }
}
