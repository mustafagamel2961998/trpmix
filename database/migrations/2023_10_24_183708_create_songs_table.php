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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('words')->nullable();
            $table->text('listen_link');
            $table->text('download_link');

            $table->foreignId('album_id')
                  ->nullable()
                  ->constrained('albums')
                  ->nullOnDelete();

            $table->foreignId('singer_id')
                  ->nullable()
                  ->constrained('singers')
                  ->nullOnDelete();

            $table->foreignId('singer_duet_id')
                  ->nullable()
                  ->constrained('singers')
                  ->nullOnDelete();

            $table->foreignId('admin_id')
                  ->nullable()
                  ->constrained('admins')
                  ->nullOnDelete();

            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->nullOnDelete();

            $table->string('year')->nullable();
            $table->string('time')->nullable();
            $table->string('kind')->nullable();
            $table->bigInteger('listen_count')->default(0);

            $table->enum('status',['pin','active','archived'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
