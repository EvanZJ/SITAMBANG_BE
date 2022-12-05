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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->required();
            $table->unsignedBigInteger('karyawan_id')->required();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
            $table->integer('totalPembayaran')->required();
            $table->string('caraPembayaran')->required();
            $table->string('status')->required();
            $table->dateTime('verified_at')->nullable();
            $table->string('bukti_path')->nullable();
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
        Schema::dropIfExists('pemesanans');
    }
};
