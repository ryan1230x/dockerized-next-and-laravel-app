<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reference');
            $table->string('address');
            $table->string('name');
            $table->unsignedBigInteger('landline');
            $table->unsignedBigInteger('contact_number');
            $table->string('network');
            $table->string('service');
            $table->boolean('portability');
            $table->string('package');
            $table->string('created_by', 200);
            $table->timestamp('requested_date');
            $table->longText('ticket_id');
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
        Schema::dropIfExists('tickets');
    }
}
