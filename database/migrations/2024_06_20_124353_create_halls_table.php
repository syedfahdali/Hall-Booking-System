<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallsTable extends Migration
{
    public function up()
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('capacity');
            $table->string('location');
            $table->decimal('price', 8, 2);
            $table->boolean('availability');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('halls');
    }
}
