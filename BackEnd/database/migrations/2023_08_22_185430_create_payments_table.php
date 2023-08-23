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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('collection_amount');
            $table->string('collection_type');
            $table->foreignId('user_id')->constrained('users', 'id' )
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('billing_id')
                ->constrained('billings', 'id')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    // payments table
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
