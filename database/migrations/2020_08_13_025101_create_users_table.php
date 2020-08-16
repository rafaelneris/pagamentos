<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('id');
            $table->string('name', 150)->nullable();
            $table->string('document', 14);
            $table->string('email', 100);
            $table->enum('type', ['user', 'store'])->nullable();

            $table->index(["email"], 'idx_email');

            $table->index(["document"], 'idx_document');

            $table->unique(["email"], 'uq_email_UNIQUE');

            $table->unique(["document"], 'uq_document');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
