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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');
            $table->text('website_descritpion');
            $table->text('website_keywords');
            $table->string('website_copy_right');
            
            // $table->enum('covers',[0,1])->default(0);
            $table->enum('website_ads',[0,1])->default(0);
            $table->enum('google_ads',[0,1])->default(0);

            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            
            $table->string('user_website_navbar_bg')->default('#d7083f');
            $table->string('user_website_bg')->default('#280b3c');
            $table->string('user_website_content_bg')->default('#180427');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
