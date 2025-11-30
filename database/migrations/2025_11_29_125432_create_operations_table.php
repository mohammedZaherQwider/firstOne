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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('id_patient');
            $table->foreignId('user_id');
            $table->foreignId('hospital_id');
            $table->foreignId('doctor_id');
            $table->foreignId('specialization_id');
            $table->string('operation_name');
            $table->date('operation_date');
            $table->string('operation_date_time');
            $table->string('operation_schedule');
            $table->enum('status', ['scheduled', 'done', 'cancelled']);
            $table->text('report');
            $table->decimal('price', 10, 2);
            $table->boolean('pay')->default(false);
            $table->enum('currency', ['USD', 'ILS', 'JOD'])->default('USD');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
