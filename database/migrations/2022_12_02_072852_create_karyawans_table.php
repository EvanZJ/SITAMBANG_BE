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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->default(false);
            $table->string('name')->required();
            $table->string('email')->unique()->required();
            $table->string('jenis_kelamin')->required();
            $table->string('alamat')->required();
            $table->string('tempat_lahir')->required();
            $table->date('tanggal_lahir')->required();
            $table->string('jabatan')->required();
            $table->string('no_telp')->required();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->required();
            $table->tinyInteger('status')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('karyawans');
    }
};
