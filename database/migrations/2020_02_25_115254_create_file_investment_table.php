<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileInvestmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('file_investment', function (Blueprint $table) {
        //     $table->bigIncrements('id')->autoIncrement()->comment('Klucz główny tabeli');
        //     $table->unsignedBigInteger('investment_id')->comment('Klucz obcy tabeli investments');
        //     $table->foreign('investment_id')->references('id')->on('investments')->onDelete('cascade');
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
        Schema::dropIfExists('file_investment');
    }
}
