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
        Schema::create('bertanggungjawabs', function (Blueprint $table) {
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('alat_tambak_id');
            $table->unique(['karyawan_id', 'alat_tambak_id']);
            $table->foreign('karyawan_id')->references('id')->on('karyawans')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('alat_tambak_id')->references('id')->on('alat_tambaks')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('bertanggungjawabs');
    }
};
