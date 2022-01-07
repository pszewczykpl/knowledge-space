<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DeleteUserSystemConfiguration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            /**
             * Using DB::statement, because SQLite don't allow drop more than 1 column.
             */
            DB::statement('ALTER TABLE users DROP "v_rounded"');
            DB::statement('ALTER TABLE users DROP "v_aside_toggled"');
            DB::statement('ALTER TABLE users DROP "v_dark_mode"');
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
            $table->integer('v_rounded')->default(2)->after('avatar_path');
            $table->boolean('v_aside_toggled')->default(false)->after('avatar_path');
            $table->boolean('v_dark_mode')->default(false)->after('avatar_path');
        });
    }
}
