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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('position_id')->constrained();
            $table->foreignId('dependency_id')->constrained();
            $table->foreignId('corporative_group_id')->constrained();
            $table->foreignId('type_appointment_id')->constrained();
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('with_people_charge')->default(false);
            $table->enum('gender', ['male', 'female', 'NS/NR']);
            // TODO: Pendiente Agregar Edad, Antiguedad y Escolaridad
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
