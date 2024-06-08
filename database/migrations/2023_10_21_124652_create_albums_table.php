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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')
                  ->nullable()
                  ->constrained('admins')
                  ->nullOnDelete();
            $table->foreignId('singer_id')
                  ->constrained('singers')
                  ->cascadeOnDelete();       
            $table->string('name');
            $table->string('slug')
                  ->unique();
            $table->string('album_download_link');
            $table->bigInteger('view')->default(0);
            $table->enum('status',['active','archived'])
                 ->default('active');
            $table->softDeletes();                     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
