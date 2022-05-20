<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement_location', function (Blueprint $table) {
            $table->uuid('announcement_id');
            $table->uuid('location_id');

            $table->foreign('announcement_id')->references('id')->on('announcements')
                ->cascadeOnDelete();
            $table->foreign('location_id')->references('id')->on('locations')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcement_location');
    }
}
