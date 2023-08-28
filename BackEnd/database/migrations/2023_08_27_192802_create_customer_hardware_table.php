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
        Schema::create('customer_hardware', function (Blueprint $table) {
            $table->id();

            $table->string('stb_type');

            $table->foreignId('customer_id')->constrained('customers', 'id')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('hardware_id')->constrained('hardware', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_hardware');
    }
};
