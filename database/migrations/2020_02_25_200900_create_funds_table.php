<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id')->comment('Klucz główny tabeli');
            $table->string('code')->comment('Kod funduszu');
            $table->string('name')->comment('Nazwa funduszu');
            $table->string('status')->comment('Status');
            $table->string('type')->comment('Typ funduszu');
            $table->string('currency')->comment('Waluta');
            $table->date('cancel_date')->comment('Data anulowania funduszu')->nullable($value = true);
            $table->date('start_date')->comment('Data początku obowiązywania funduszu')->nullable($value = true);
            $table->string('cancel_reason')->comment('Powód anulowania funduszu')->nullable($value = true);
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
        Schema::dropIfExists('funds');
    }
}
