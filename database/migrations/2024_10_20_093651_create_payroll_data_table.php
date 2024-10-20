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
        Schema::create('payroll_data', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('payroll_number', 20);
            $table->decimal('basic_salary', 10, 2);
            $table->json('allowances')->nullable();
            $table->json('deductions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_data');
    }
};
