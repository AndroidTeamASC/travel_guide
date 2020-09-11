<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('place_name');
            $table->string('image');
            $table->unsignedBigInteger('city_id');
            $table->string('wonderful');
            $table->string('best_month');
            $table->string('location');
            $table->string('map');
            $table->string('recommend');
            $table->string('lat');
            $table->string('long');
            $table->text('description');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('state_id');
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
        Schema::dropIfExists('infos');
    }
}
