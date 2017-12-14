<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('document_number');
            $table->string('email');
            $table->string('phone');
            $table->string('defaulter'); //Inadimplente;
            $table->date('date_birth');
            $table->char('sex', 10);
            $table->enum('marital_status', array_keys(\App\Client::MARITAL_STATUS));
            $table->enum('deficiency', array_keys(\App\Client::DEFICIENCY))->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
