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
        Schema::create('singers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')
                  ->nullable()
                  ->constrained('admins')
                  ->nullOnDelete();
            $table->string('name')
                  ->unique();
            $table->string('slug')
                  ->unique();
            $table->string('bio')
                  ->nullable(); 
            $table->char('country_code',3);
            $table->enum('status',['active','archived'])
                  ->default('active');
            $table->enum('single_status',['single','with_singer'])
                  ->default('single');                  
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('singers');
    }
};
