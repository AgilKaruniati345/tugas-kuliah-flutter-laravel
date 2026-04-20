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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // ID utama

            // pakai ini dulu biar aman (tanpa relasi dulu)
            $table->unsignedBigInteger('user_id'); 

            $table->string('title'); // judul tugas
            $table->text('description'); // deskripsi tugas
            $table->date('deadline'); // tanggal deadline

            // pakai string biar aman di SQLite
            $table->string('status')->default('belum'); 

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};