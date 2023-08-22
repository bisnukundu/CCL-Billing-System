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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_amount');
            $table->integer('addtional_charge');
            $table->integer('discount');
            $table->integer('vat')->nullable();
            $table->bigInteger('advance');
            $table->dateTime('billing_month');
            $table->integer('dues');
            $table->bigInteger('customer_id');
            $table->foreignId('customer_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
