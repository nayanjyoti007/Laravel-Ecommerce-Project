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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brnad_name_en')->nullable();
            $table->string('brnad_name_hin')->nullable();
            $table->string('brnad_slug_en')->nullable();
            $table->string('brnad_slug_hin')->nullable();
            $table->string('brnad_image')->nullable();
            $table->char('status', 1)->comment('1:active,2:de-active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
