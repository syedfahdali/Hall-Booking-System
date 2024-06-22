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
            $table->unsignedBigInteger('user_id'); // Ensure this matches the type in `users` table
            $table->string('type');
            $table->integer('capacity');
            $table->string('location');
            $table->decimal('price', 8, 2);
            $table->boolean('availability');
            $table->string('image');
            $table->timestamps();

            // Add the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('halls', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key constraint first
        });
        Schema::dropIfExists('halls');
    }
}


