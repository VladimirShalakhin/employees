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
        Schema::create('pay_days', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('employee_id')->constrained(
                table: 'employee'
            )->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_days');
    }
};
