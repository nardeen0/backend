<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTargetAudienceToDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directions', function (Blueprint $table) {
            $table->string('target_audience')->after('qualification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directions', function (Blueprint $table) {
            $table->dropColumn('target_audience');
        });
    }
}
