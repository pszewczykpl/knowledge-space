<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id')->comment('Klucz główny tabeli');
            $table->string('group')->comment('Grupa produktowa');
            $table->string('name')->comment('Nazwa produktu');
            $table->integer('code')->comment('Kod produktu');
            $table->string('dist_short')->comment('Kod dystrybutora');
            $table->string('dist')->comment('Nazwa dystrybutora');
            $table->string('code_owu')->comment('Kod OWU');
            $table->string('code_toil')->comment('Kod TOiL');
            $table->date('edit_date')->comment('Początek obowiązywania kompletu dokumentów');
            $table->string('type')->comment('Typ produktu');
            $table->string('status')->comment('Status kompletu dokumentów');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('investments');
    }
}
