<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->text('long_url'); // Kolom long_url dengan tipe text
            $table->string('short_url')->unique(); // Kolom short_url
            $table->enum('status', ['draft', 'online'])->default('draft'); // Status dengan enum
            $table->integer('visits')->default(0); // Jumlah kunjungan
            $table->timestamps(); // Timestamps otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
}
