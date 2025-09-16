<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default('')->unique();
            $table->string('address')->nullable()->default('')->unique();
            $table->string('phone')->nullable()->default('');
            $table->boolean('status')->nullable()->default(false);
            $table->biginteger('city_id')->unsigned(); 
            $table->foreign('city_id')->references('id')->on('cities') ;
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
