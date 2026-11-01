<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myurl', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('url_id');
            $table->enum('status', ['draft', 'online']);
            $table->timestamp('visited_at')->nullable(); // Allow null value for visited_at
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('myurl');
    }
}
