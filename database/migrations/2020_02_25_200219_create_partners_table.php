<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id')->comment('Klucz główny tabeli');
            $table->string('name')->comment('Nazwa partnera');
            $table->string('number_rau')->comment('Numer RAU/P')->nullable($value = true);
            $table->string('code')->comment('Kod partnera');
            $table->string('nip')->nullable()->comment('Numer NIP')->nullable($value = true);
            $table->string('regon')->nullable()->comment('Numer REGON')->nullable($value = true);
            $table->string('type')->nullable()->comment('Typ partnera')->nullable($value = true);
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
        Schema::dropIfExists('partners');
    }
}
