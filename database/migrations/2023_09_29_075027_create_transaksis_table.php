<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('nama');
            $table->integer('total');
            $table->date('tanggal');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('kategoris_id');
            $table->foreign('kategoris_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->timestamps();
            $table->unsignedBigInteger('bulans_id');
            $table->foreign('bulans_id')->references('id')->on('bulans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
