<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_procedure', function (Blueprint $table) {
            $table->uuid('procedure_id');
            $table->uuid('location_id');

            $table->foreign('procedure_id')->references('id')->on('procedures')
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
        Schema::dropIfExists('location_procedure');
    }
}
