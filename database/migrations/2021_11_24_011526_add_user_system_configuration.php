<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserSystemConfiguration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('v_rounded')->default(2)->after('avatar_path');
            $table->boolean('v_aside_toggled')->default(false)->after('avatar_path');
            $table->boolean('v_dark_mode')->default(false)->after('avatar_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('v_rounded');
            $table->dropColumn('v_aside_toggled');
            $table->dropColumn('v_dark_mode');
        });
    }
}
