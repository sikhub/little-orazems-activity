<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function($table)
        {
            $table->index('slug', 'slug_index');
        });

        Schema::table('schedules', function($table)
        {
            $table->index('activity_id', 'activity_id_index');
            $table->index('activity_start', 'activity_start_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function($table)
        {
            $table->dropIndex('slug');
        });

        Schema::table('schedules', function($table)
        {
            $table->dropIndex('activity_id');
            $table->dropIndex('activity_start');
        });
    }
}
