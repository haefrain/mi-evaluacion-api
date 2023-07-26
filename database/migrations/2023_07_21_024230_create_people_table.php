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
            $table->enum('age', ['0-25', '26-35', '36-45', '46-55', '56-999'])->comment('Es el rango de edad en el que esta la persona')->nullable();
            $table->enum('seniority', ['0-2', '3-5', '6-10', '11-15', '15-999'])->comment('Es la cantidad de años de experiencia que tiene la persona')->nullable();
            $table->enum('education_level', ['NoBachiller', 'Bachiller', 'Tecnico', 'Universitario', 'Profesional', 'Post-grado'])->nullable();
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
