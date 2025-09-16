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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default('');
            $table->text('description')->nullable()->default('');
            $table->string('seoName')->nullable()->default('');
            $table->text('seoDescription')->nullable()->default('');
            $table->string('tags')->nullable()->default('');
            $table->string('icon')->nullable()->default('');
            $table->string('image')->nullable()->default('');
            $table->string('phone')->nullable()->default('');
            $table->string('email')->nullable()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
