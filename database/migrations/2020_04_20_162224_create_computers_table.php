<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('local_id');
            $table->string('brand');
            $table->string('model_or_serial');
            $table->string('specification');
            $table->string('ip_address');
            $table->string('company_id');
            $table->integer('live_year');
            $table->string('price');
            $table->date('bought_date');
            $table->string('image');
            $table->string('warranty_card');
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
        Schema::dropIfExists('computers');
    }
}
