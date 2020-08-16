<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundInvestmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_investment', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id')->autoIncrement()->comment('Klucz główny tabeli');
            $table->unsignedBigInteger('investment_id')->comment('Klucz obcy tabeli investments');
            $table->unsignedBigInteger('fund_id')->comment('Klucz obcy tabeli funds');
            $table->timestamps();
            $table->foreign('investment_id')->references('id')->on('investments');
            $table->foreign('fund_id')->references('id')->on('funds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments_funds');
    }
}
