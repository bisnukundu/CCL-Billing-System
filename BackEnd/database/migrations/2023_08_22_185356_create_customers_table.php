<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('customer_type');
            $table->integer('monthly_bill');
            $table->integer('additional_charge')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('advance')->nullable();
            $table->boolean('active');
            $table->string('connection_date')->nullable();
            $table->string('bill_genarate_status')->nullable();
            $table->string('note')->nullable();
            $table->string('bill_collector');
            $table->integer('number_of_connection');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations. just change
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
