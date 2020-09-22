<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protectives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('code');
            $table->string('dist_short');
            $table->string('dist');
            $table->string('code_owu');
            $table->integer('subscription');
            $table->date('edit_date');
            $table->string('status');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protectives');
    }
}
