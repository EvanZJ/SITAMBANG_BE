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
        Schema::create('alat_tambaks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->unsignedBigInteger('karyawan_id')->required();
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
            $table->string('kondisi');
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
        Schema::dropIfExists('alat_tambaks');
    }
};
