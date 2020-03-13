<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyClienteEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->unsignedBigInteger('endereco_id');

            $table->foreign('endereco_id')->references('id')->on('endereco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['endereco_id']);
            Schema::enableForeignKeyConstraints();
        });
    }
}
