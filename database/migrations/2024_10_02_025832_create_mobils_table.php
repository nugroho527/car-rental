<?php

use App\Models\User;
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
        Schema::create('mobil', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->string('no_polisi')->nullable();
            $table->string('merk')->nullable();
            $table->enum('jenis', ['sedan', 'MPV', 'SUV'])->nullable();
            $table->string('kapasitas')->nullable();
            $table->string('harga')->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
