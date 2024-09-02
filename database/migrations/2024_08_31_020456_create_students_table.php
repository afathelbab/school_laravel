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
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedInteger('code')->primary(); //primary key, default -> big int, 
            $table->string('name', 30);
            $table->string('email', 255)->unique();
            $table->char('phone',11)->unique()->nullable();
            $table->unsignedTinyInteger('department_id');
            $table->foreign('department_id')->references('department_id')->on('departments');
            $table->timestamps(); //created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
