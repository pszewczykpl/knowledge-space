<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('file_employee', function (Blueprint $table) {
        //     $table->bigIncrements('id')->autoIncrement()->comment('Klucz główny tabeli');
        //     $table->unsignedBigInteger('employee_id')->comment('Klucz obcy tabeli employees');
        //     $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('file_employee');
    }
}
