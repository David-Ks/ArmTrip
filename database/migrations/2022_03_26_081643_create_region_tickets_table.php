<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('ticket_id')->unsigned()->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('set null');
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
        Schema::dropIfExists('region_tickets');
    }
}
