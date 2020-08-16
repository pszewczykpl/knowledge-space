<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileProtectiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('file_protective', function (Blueprint $table) {
        //     $table->bigIncrements('id')->autoIncrement()->comment('Klucz główny tabeli');
        //     $table->unsignedBigInteger('protective_id')->comment('Klucz obcy tabeli protectives');
        //     $table->foreign('protective_id')->references('id')->on('protectives')->onDelete('cascade');
        //     $table->unsignedBigInteger('file_id')->comment('Klucz obcy tabeli files');
        //     $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_protective');
    }
}
