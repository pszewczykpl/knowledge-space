<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id')->comment('Klucz główny tabeli');
            $table->string('path')->nullable()->comment('Pełna ścieżka do pliku w folderze uploads/');
            $table->unsignedBigInteger('file_category_id')->nullable()->comment('Klucz obcy tabeli file_categories');
            $table->foreign('file_category_id')->references('id')->on('file_categories');
            $table->string('name')->nullable()->comment('Nazwa wyświetlana pliku');
            $table->string('extension')->nullable()->comment('Rozszerzenie pliku');
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
        Schema::dropIfExists('files');
    }
}
