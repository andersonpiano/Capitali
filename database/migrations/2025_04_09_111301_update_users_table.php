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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['cliente', 'profissional', 'admin'])->default('cliente');
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->string('location')->nullable(); // Para geolocalização
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'bio', 'location']);
        });
    }
};
