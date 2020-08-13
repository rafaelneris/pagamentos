<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{

    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'usuarios';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome', 150)->nullable();
            $table->string('cpf_cnpj', 14);
            $table->string('email', 100);
            $table->char('senha', 40);
            $table->enum('tipo', ['usuario', 'loja'])->nullable();

            $table->index(["email"], 'idx_email');

            $table->index(["cpf_cnpj"], 'idx_cpfcnpj');

            $table->unique(["email"], 'uq_email_UNIQUE');

            $table->unique(["cpf_cnpj"], 'uq_cpf_cnpj');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
