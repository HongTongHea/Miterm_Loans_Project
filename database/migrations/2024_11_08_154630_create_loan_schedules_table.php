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
        Schema::create('loan_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_id');
            $table->date('payment_date');
            $table->decimal('payment_amount', 10, 2);
            $table->decimal('principal_paid', 10, 2);
            $table->decimal('interest_paid', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_schedules');
    }
};
