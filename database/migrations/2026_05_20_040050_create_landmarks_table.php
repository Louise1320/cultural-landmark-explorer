<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('landmarks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('country', ['cambodia', 'philippines']);
            $table->string('country_code', 2);
            $table->string('location');
            $table->enum('category', ['Historical', 'Natural', 'Religious']);
            $table->text('description');
            $table->text('why_visit');
            $table->string('image');
            $table->json('gallery')->nullable();
            $table->string('map_embed')->nullable();
            $table->string('fun_fact')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landmarks');
    }
};