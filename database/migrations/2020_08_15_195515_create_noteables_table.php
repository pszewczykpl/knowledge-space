<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noteables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id')->comment('Klucz obcy tabeli notes');
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
            $table->unsignedBigInteger('noteable_id')->comment('Klucz obcy');
            $table->string('noteable_type');
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
        Schema::dropIfExists('noteables');
    }
}
