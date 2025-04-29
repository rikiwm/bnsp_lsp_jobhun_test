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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjams_id')->nullable()->index();
            $table->foreignId('pengguna_id')->nullable()->index();
            $table->date('tanggal_pengembalian')->nullable()->index();
            $table->integer('denda')->nullable();
            $table->text('note')->nullable();
            // $table->decimal('denda', 10, 2)->default(0);
            $table->foreignId('accept_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
