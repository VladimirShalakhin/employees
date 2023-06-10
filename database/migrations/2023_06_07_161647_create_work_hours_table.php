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
        Schema::create('work_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained(
                table: 'employee'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('status_id')->default('1')->constrained(
                table: 'status'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->float('hours')->nullable(false);
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            //$table->integer('status_id')->default('1');
            //$table->foreign('employee_id')->references('id')->on('employees.employee');
            //$table->foreign('status_id')->references('id')->on('employees.status');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_hours');
    }
};
