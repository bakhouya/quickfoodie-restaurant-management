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
        Schema::create('asset_has_materials', function (Blueprint $table) {
            $table->id();
            $table->biginteger('asset_id')->unsigned(); 
            $table->foreign('asset_id')->references('id')->on('assets') ;
            $table->biginteger('material_id')->unsigned(); 
            $table->foreign('material_id')->references('id')->on('materials') ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_has_materials');
    }
};
