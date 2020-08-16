<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_groups', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id')->comment('Klucz główny tabeli');
            $table->string('code')->comment('Kod grupy produktowej');
            $table->string('name')->comment('Nazwa grupy produktowej');
            $table->string('type')->comment('Typ grupy produktowej');
            $table->string('description')->comment('Opis grupy produktowej');
            $table->date('sale_date_from')->comment('Data rozpoczęcia sprzedaży w grupie produktowej');
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
        Schema::dropIfExists('investment_groups');
    }
}
