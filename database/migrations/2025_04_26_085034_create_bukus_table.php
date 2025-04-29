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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('judul')->index();
            $table->string('penulis')->index();
            $table->string('penerbit');
            $table->year('tahun_terbit')->default(date('Y'));
            $table->integer('stok')->default(0);
            $table->boolean('status')->default(1);
            $table->json('optional')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
