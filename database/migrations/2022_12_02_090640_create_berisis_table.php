<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berisis', function (Blueprint $table) {
            $table->unsignedBigInteger('pemesanan_id');
            $table->unsignedBigInteger('stock_id');
            $table->unique(['pemesanan_id', 'stock_id']);
            $table->foreign('pemesanan_id')->references('id')->on('pemesanans')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('kuantitas');
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
        Schema::dropIfExists('berisis');
    }
};
